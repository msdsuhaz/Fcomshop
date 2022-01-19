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
use App\Model\Productssize;
use Illuminate\Support\Facades\Validator;
use Cart;
use session;

class CardController extends Controller
{
    public function addtocard(Request $request){
        $validator = Validator::make($request->all(), [
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        $product = Products::where('id',$request->id)->first();
        $product_size=Size::where('id',$request->size_id)->first();
        $product_color=Color::where('id',$request->color_id)->first();
      

        Cart::add([
            'id' => $product->id,
            'name' =>$product->name, 
            'qty' =>$request->qty, 
            'price' =>$product->price, 
            'weight' => 550,
            'options' =>[
                  'Size_id'=>$request->size_id,
                  'size_name'=>$product_size->name,
                  'Color_id'=>$request->color_id,
                  'color_name'=>$product_color->name,
                  'image'=>$product->image
            ]
        ]);
        return redirect()->route('view.Card')->with('message','Product save successfuly');
    }

    public function view(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product'] =Products::orderBy('id','DESC')->paginate();
        return view('frontend.card.view-card',$data);
    }

    public function shopping_cart_update(Request $request){
        Cart::update($request->rowId,$request->qty);
        return redirect()->route('view.Card')->with('message','product update successfuly');
    }

    public function shopping_cart_delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('view.Card')->with('message','product delete successfuly');

    }

    


}
