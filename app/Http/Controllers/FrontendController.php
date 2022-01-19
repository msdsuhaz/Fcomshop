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
use DB;

class FrontendController extends Controller
{
    public function index(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['slider']=Slider::all();
        $data['category'] =Products::select('category_id')->groupBy('category_id')->get();
        $data['brand'] =Products::select('brand_id')->groupBy('brand_id')->get();
        $data['product'] =Products::orderBy('id','DESC')->paginate();
        return view('frontend.home.home',$data);
    }

    public function productList(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product'] =Products::orderBy('id','DESC')->paginate(12);
        $data['category'] =Products::select('category_id')->groupBy('category_id')->get();
        $data['brand'] =Products::select('brand_id')->groupBy('brand_id')->get();
       return view('frontend.single-page.productlist',$data);
    }

    public function category_wise_product($category_id){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product'] =Products::where('category_id',$category_id)->orderBy('id','DESC')->get();
        $data['category'] =Products::select('category_id')->groupBy('category_id')->get();
        $data['brand'] =Products::select('brand_id')->groupBy('brand_id')->get();
        return view('frontend.single-page.category-wise-product',$data);

    }

    public function brand_wise_product($brand_id){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product'] =Products::where('brand_id',$brand_id)->orderBy('id','DESC')->get();
        $data['category'] =Products::select('category_id')->groupBy('category_id')->get();
        $data['brand'] =Products::select('brand_id')->groupBy('brand_id')->get();
        return view('frontend.single-page.brand-wise-product',$data);

    }

    public function Productdetaisl($slug){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product'] =Products::where('slug',$slug)->first();
        $data['subimage'] =Productsimage::where('product_id',$data['product']->id)->get();
        $data['size'] =Productssize::where('product_id',$data['product']->id)->get();
        $data['color'] =Productscolor::where('product_id',$data['product']->id)->get();
        return view('frontend.single-page.product-details',$data);
    }

    public function FindProduct(Request $request){

         $slug = $request->slug;
         $data['product'] =Products::where('slug',$slug)->first();
         if($data['product']){
                $data['logo']=Logo::first();
                $data['contact']=Contact::first();
                $data['product'] =Products::where('slug',$slug)->first();
                $data['subimage'] =Productsimage::where('product_id',$data['product']->id)->get();
                $data['size'] =Productssize::where('product_id',$data['product']->id)->get();
                $data['color'] =Productscolor::where('product_id',$data['product']->id)->get();
                return view('frontend.single-page.find-product',$data);
         }else{
             return redirect()->back();
         }

    }

    public function GetProduct(Request $request){

        $slug =$request->slug;
        $productData = DB::table('products')
                            ->where('slug','LIKE','%'.$slug.'%')
                            ->get();
        $html ='';
        $html='<div><ul>';
        if($productData){
            foreach($productData as $v){
                 $html .='<li>'.$v-slug.'</li>';
            }
        }
        $html .= '</ul></div>';
        return response()->json($html);

    }
}
