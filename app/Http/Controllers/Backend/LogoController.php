<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Model\Logo;
use Auth;

class LogoController extends Controller
{
    public function view(){
        $data['alldata'] =Logo::all();
        return view('backend.logo.view-logo',$data);
    }
 
    public function add(){
         return view('backend.logo.add-logo');
    }
 
    public function store(Request $request){
        $data = new Logo();
        $data->create_by = Auth::user()->name;
        $data->update_by = Auth::user()->name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image'),$filename);
            $data['image'] =$filename;
        }
        $data->save();

        return redirect()->route('logo.view')->with('success','save info successfully');
 
     }
 
     public function edit($id){
          $editdata =Logo::find($id);
          return view('backend.logo.add-logo',compact('editdata'));
     }
 
     public function update(Request $request,$id){
        $data = Logo::find($id);
        $data->create_by = Auth::user()->name;
        $data->update_by = Auth::user()->name;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/logo_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image'),$filename);
            $data['image'] =$filename;
        }
        $data->save();

        return redirect()->route('logo.view')->with('success','save info successfully');
 
      }
 
      public function delete($id){
          $data = Logo::find($id);
          $data->delete();
          return redirect()->route('logo.view')->with('message','Delete Data successfully');
 
      }
   
}
