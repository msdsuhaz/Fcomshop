<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Size;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function view(){
        $data['alldata'] =Size::all();
        return view('backend.size.view-size',$data);
    }
 
    public function add(){
         return view('backend.size.add-size');
    }
 
    public function store(Request $request){
             $this->validate($request,[
                 'name'=> 'required|unique:sizes,name'
             ]);
 
             $data = new Size();
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
 
             return redirect()->route('size.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $editdata =Size::find($id);
          return view('backend.size.add-size',compact('editdata'));
     }
 
     public function update(sizeRequest $request,$id){
             $data=Size::find($id);
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
             return redirect()->route('size.view')->with('message','update info successfully');
 
      }
 
      public function delete($id){
          $data = Size::find($id);
          $data->delete();
          return redirect()->route('size.view')->with('message','Delete Data successfully');
 
      }
}
