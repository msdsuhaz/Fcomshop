<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Color;
use App\Model\Size;
use App\Model\Contact;
use App\Model\Products;
use App\Model\Productscolor;
use App\Model\Productsimage;
use App\User;
use App\Model\Productssize;
use Illuminate\Support\Facades\Validator;
use Cart;
use Session;
use DB;
use Mail;
use Auth;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\Payment;
use App\Model\OrderDetails;

class CheckOutController extends Controller
{
    public function CoustomerLogin(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.cheeckout.castomer-login',$data);
    }

    public function CoustomerRegister(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.cheeckout.castomer-register',$data);
    }

    public function StoreRegister(Request $request){
        DB::transaction(function () use($request) {
            $request->validate([
                'name' =>'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
           ]);
           $code =rand(0000,9999);
           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->phone = $request->phone;
           $user->password =bcrypt($request->password);
           $user->code =$code;
           $user->status = '0';
           $user->usertype = 'customer';
           $user->save();  

        });
      

        return redirect()->route('castomer.login')->with('message','you have sucessfuly sign up.please login ');
       
    }

    public function EmailVerfy(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.cheeckout.email-verify',$data);
    }

    public function VerfyCodeAndEmail(Request $request){
       $Data = User::where('email',$request->email)->where('code',$request->code)->first();
       if($Data){
               $Data->status = '1';
               $Data->save();
               return redirect()->route('castomer.login')->with('message','varification successfuly done');
       }else{
              return redirect()->back()->with('message','email and varification doesnt mach');
      }
       
    
    }

    public function CheckoutAuth(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.cheeckout.castomer-checkout',$data);
    }

    public function CheckoutStore(Request $request){
        
        $Checkout = new Shipping();
        $Checkout->user_id = Auth::user()->id;
        $Checkout->name = $request->name;
        $Checkout->email = $request->email;
        $Checkout->mobile_no = $request->mobile_no	;
        $Checkout->address = $request->address;
        $Checkout->save();
        Session::put('shipping_id',$Checkout->id);

        return redirect()->route('customer.payment')->with('message','data save suceesfully');

    }
}



  






