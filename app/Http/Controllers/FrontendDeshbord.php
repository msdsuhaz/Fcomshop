<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Contact;
use App\Model\Slider;
use App\Model\Products;
use App\Model\Productscolor;
use App\Model\Productsimage;
use App\Model\Productssize;
use App\User;
use Auth;
use Session;
use DB;
use Cart;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\Payment;
use App\Model\OrderDetails;

class FrontendDeshbord extends Controller
{
    public function deshboard(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['user']=Auth::user();
        return view('frontend.deshboard.deshboard_home',$data);
    }

    public function profileEdit(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['editData']=User::find(Auth::user()->id);
        return view('frontend.deshboard.editCustomerProfile',$data);
    }

    public function profileUpdate(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $user['image'] =$filename;
        }
        $user->save();

        return redirect()->route('deshbord')->with('message','data update successfully');
    }

    public function changeCustomerPassword(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['user']=Auth::user();
        return view('frontend.deshboard.changeProfilePassword',$data);
    }

    public function UpdateCustomerPassword(Request $request){

        if(Auth::attempt(['id' =>Auth::user()->id, 'password' => $request->currentpassword])){
            $user = User::find(Auth::user()->id);
            $user->password =bcrypt($request->newpassword);
            $user->save();
            return redirect()->route('deshbord')->with('message','update passowrd successfully');
        }else{
            return redirect()->back()->with('message','your current password does not mach try again');
        }

    }

    public function CustomerPayment(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.cheeckout.customer-payment',$data);
    }


    public function PaymentMethod(Request $request){
        if($request->payment_id == Null){
            return redirect()->back()->with('message','Please Add any product ');
        }else{
            $this->validate($request,[
                'payment_method'=>'required'
           ]);
           if($request->payment_method =='bikas' && $request->transtaction_no == NULL){
                return redirect()->back()->with('message','transtaction number needed');
           }
          DB::transaction(function ()  use($request){
                $payment = new Payment();
                $payment->payment_method  = $request->payment_method;
                $payment->transtaction_no = $request->transtaction_no;
                $payment->save();
   
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id  = $payment->id;
                $order_data = Order::orderBy('id', 'DESC')->first();
                if( $order_data == null){
                    $firstRef = '0';
                    $order_no =  $firstRef+1;
                }else{
                   $order_data = Order::orderBy('id', 'DESC')->first()->order_no;
                   $order_no =  $order_data+1;
                }
               $order->order_no = $order_no;
               $order->order_total	 = $request->order_total;
               $order->status  ='0';
               $order->save();
               $contents = Cart::content();
   
               foreach($contents as $content){
                   $order_details = new OrderDetails();
                   $order_details->order_id = $order->id;
                   $order_details->product_id = $content->id;
                   $order_details->color_id = $content->options->Color_id;
                   $order_details->size_id = $content->options->Size_id;
                   $order_details->quantity = $content->qty;
                   $order_details->save();
               }
               });
               Cart::destroy();
              return redirect()->route('Order.list')->with('message','data save successfully');
   
           
       }

        }
        

    public function OrderList(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.cheeckout.order-list',$data);
    }


    public function OrderDetails($id){
         
        $orderData = Order::find($id);
        $data['orders'] = Order::with(['orderDetails'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
        if($data['orders']==false){
              return redirect()->back()->with('message','dont try to be a over smart');
        }else{
            $data['logo']=Logo::first();
            $data['contact']=Contact::first();
            return view('frontend.cheeckout.order-details',$data);
       
        }
       

    }

    public function OrderDetailsPrint($id){

        $orderData = Order::find($id);
        $data['orders'] = Order::with(['orderDetails'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
        if($data['orders']==false){
              return redirect()->back()->with('message','dont try to be a over smart');
        }else{
            $data['logo']=Logo::first();
            $data['contact']=Contact::first();
            return view('frontend.cheeckout.order-print',$data);
       
        }

    }
}
