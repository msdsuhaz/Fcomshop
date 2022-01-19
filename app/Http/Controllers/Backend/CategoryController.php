<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category;
use App\Http\Requests\CategoryRequest;
use Auth;

class CategoryController extends Controller
{
    public function view(){
        $data['alldata'] =category::all();
        return view('backend.category.view-category',$data);
    }
 
    public function add(){
         return view('backend.category.add-category');
    }
 
    public function store(Request $request){
             $this->validate($request,[
                 'name'=> 'required|unique:categories,name'
             ]);
 
             $data = new category();
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
 
             return redirect()->route('category.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $editdata = category::find($id);
          return view('backend.category.add-category',compact('editdata'));
     }
 
     public function update(CategoryRequest $request,$id){
             $data=category::find($id);
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
             return redirect()->route('category.view')->with('message','update info successfully');
 
      }
 
      public function delete($id){
          $data = category::find($id);
          $data->delete();
          return redirect()->route('category.view')->with('message','Delete Data successfully');
 
      }
}
