<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Color;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    public function view(){
        $data['alldata'] =Color::all();
        return view('backend.color.view-color',$data);
    }
 
    public function add(){
         return view('backend.color.add-color');
    }
 
    public function store(Request $request){
             $this->validate($request,[
                 'name'=> 'required|unique:colors,name'
             ]);
 
             $data = new Color();
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
 
             return redirect()->route('color.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $editdata =Color::find($id);
          return view('backend.color.add-color',compact('editdata'));
     }
 
     public function update(ColorRequest $request,$id){
             $data=Color::find($id);
             $data->name = $request->name;
             $data->created_by = Auth::user()->name;
             $data->save();
             return redirect()->route('color.view')->with('message','update info successfully');
 
      }
 
      public function delete($id){
          $data = Color::find($id);
          $data->delete();
          return redirect()->route('color.view')->with('message','Delete Data successfully');
 
      }
}
