<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Products;
use App\Model\Productscolor;
use App\Model\Productsimage;
use App\Model\Productssize;
use App\Model\Brand;
use App\Model\category;
use App\Model\Color;
use App\Model\Size;
use DB;
use App\Http\Requests\productRequest;
class ProductsController extends Controller
{
    public function view(){
        $data['alldata'] = Products::all();
        return view('backend.product.view-product',$data);
    }
 
    public function add(){
         $data['categoryData'] = category::all();
         $data['BrandData'] = Brand::all();
         $data['ColorData'] = Color::all();
         $data['SizeData'] = Size::all();
         return view('backend.product.add-product',$data);
    }
 
    public function store(Request $request){
             DB::transaction(function () use($request){
                $this->validate($request,[
                    'name'=> 'required|unique:products,name',
                    'color_id'=>'required',
                    'size_id'=>'required'
                ]);
    
                $product = new Products();
                $product->category_id = $request->category_id;
                $product->brand_id = $request->brand_id;
                $product->name = $request->name;
                $product->slug = str_slug($request->name);
                $product->price = $request->price;
                $product->sort_desc = $request->sort_desc;
                $product->long_desc= $request->long_desc;
                $img = $request->file('image');
                if($img){
                    $filename = date('YmdHi').$img->getClientOriginalName();
                    $img->move(public_path('upload/product_image'),$filename);
                    $product['image'] =$filename;
                }
                if($product->save()){
                     $files = $request->sub_image;
                     if(!empty($files)){
                        foreach($files as $file){
                            $ImagName = date('YmdHi').$file->getClientOriginalName();
                            $file->move(public_path('upload/subproduct_image'),$ImagName);
                            $subimage['sub_image'] =$ImagName;

                            $productSubImage = new Productsimage();
                            $productSubImage->product_id = $product->id;
                            $productSubImage->sub_image = $ImagName;
                            $productSubImage->save();
                        }
                     }
                     $colors =$request->color_id;
                     if(!empty($colors)){
                         foreach($colors as $color){
                             $productColor = new Productscolor();
                             $productColor->product_id = $product->id;
                             $productColor->color_id =  $color;
                             $productColor->save();
                         }
                     }

                     $sizes =$request->size_id;
                     if(!empty($sizes)){
                         foreach($sizes as $size){
                             $productsize = new Productssize();
                             $productsize->product_id = $product->id;
                             $productsize->size_id =  $size;
                             $productsize->save();
                         }
                     }


                }else{
                    return redirect()->back();
                }
             });
             return redirect()->route('products.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $data['editdata'] = Products::find($id);
          $data['categoryData'] = category::all();
          $data['BrandData'] = Brand::all();
          $data['ColorData'] = Color::all();
          $data['SizeData'] = Size::all();
          $data['color_array'] =Productscolor::select('color_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get();
          $data['size_array'] =Productssize::select('size_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get();
          return view('backend.product.add-product',$data);
     }
 
     public function update(productRequest $request,$id){
        DB::transaction(function () use($request,$id){
            $this->validate($request,[
            ]);

            $product =Products::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->slug =str_slug($request->name);
            $product->price = $request->price;
            $product->sort_desc = $request->sort_desc;
            $product->long_desc= $request->long_desc;
            $img = $request->file('image');
            if($img){
                $filename = date('YmdHi').$img->getClientOriginalName();
                $img->move(public_path('upload/product_image'),$filename);
                if(file_exists('public/upload/product_image/'.$product->image) AND !empty($product->image)){
                     unlink('public/upload/product_image/'.$product->image);
                }
                $product['image'] =$filename;
            }
            if($product->save()){
                 $files = $request->sub_image;
                 if(!empty($file)){
                      $subImage = Productsimage::where('product_id',$id)->get()->toArray();
                      foreach($subImage as $value){
                          unlink('public/upload/subproduct_image/'.$value['subImage']);
                      }
                      Productsimage::where('product_id',$id)->delete();

                 }
                 if(!empty($files)){
                    foreach($files as $file){
                        $ImagName = date('YmdHi').$file->getClientOriginalName();
                        $file->move(public_path('upload/subproduct_image'),$ImagName);
                        $subimage['sub_image'] =$ImagName;

                        $productSubImage = new Productsimage();
                        $productSubImage->product_id = $product->id;
                        $productSubImage->sub_image = $ImagName;
                        $productSubImage->save();
                    }
                 }
                 $colors =$request->color_id;
                 if(!empty($colors)){
                    Productscolor::where('product_id',$id)->delete();
                 }
                 if(!empty($colors)){
                     foreach($colors as $color){
                         $productColor = new Productscolor();
                         $productColor->product_id = $product->id;
                         $productColor->color_id =  $color;
                         $productColor->save();
                     }
                 }

                 $sizes =$request->size_id;
                 if(!empty($sizes)){
                    Productssize::where('product_id',$id)->delete();
                 }
                 if(!empty($sizes)){
                     foreach($sizes as $size){
                         $productsize = new Productssize();
                         $productsize->product_id = $product->id;
                         $productsize->size_id =  $size;
                         $productsize->save();
                     }
                 }


            }else{
                return redirect()->back();
            }
         });
         return redirect()->route('products.view')->with('message','save info successfully');
      }
 
      public function delete($id){
          $product = Products::find($id);
          if(file_exists('public/upload/product_image/'.$product->image) AND !empty($product->image)){
            unlink('public/upload/product_image/'.$product->image);
          }

          Productsimage::where('product_id',$product->id)->delete();
          Productscolor::where('product_id',$product->id)->delete();
          Productssize::where('product_id',$product->id)->delete();
          $product->delete();

          
          return redirect()->route('products.view')->with('message','Delete Data successfully');
 
      }

      public function details($id){
             $details = Products::find($id);
             return view('backend.product.details',compact('details'));
      }
}
