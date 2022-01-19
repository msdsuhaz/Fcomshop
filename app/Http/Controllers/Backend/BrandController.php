<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Auth;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function view(){
        $data['alldata'] =Brand::all();
        return view('backend.brand.view-brand',$data);
    }
 
    public function add(){
         return view('backend.brand.add-brand');
    }
 
    public function store(Request $request){
             $this->validate($request,[
                 'name'=> 'required|unique:brands,name'
             ]);
 
             $data = new Brand();
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
 
             return redirect()->route('brand.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $editdata = Brand::find($id);
          return view('backend.brand.add-brand',compact('editdata'));
     }
 
     public function update(BrandRequest $request,$id){
             $data=Brand::find($id);
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
             return redirect()->route('brand.view')->with('message','update info successfully');
 
      }
 
      public function delete($id){
          $data = Brand::find($id);
          $data->delete();
          return redirect()->route('brand.view')->with('message','Delete Data successfully');
 
      }
}
