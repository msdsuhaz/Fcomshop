<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;

class ContactController extends Controller
{
    public function view(){
        $data['alldata'] =Contact::all();
        return view('backend.contact.view-contact',$data);
    }
 
    public function add(){
         return view('backend.contact.add-contact');
    }
 
    public function store(Request $request){
             $this->validate($request,[
                 'address'=> 'required',
                 'mobile'=> 'required',
                 'email'=> 'required',
                 'facebook'=> 'required',
                 'twitter'=> 'required',
                 'youtube'=> 'required'
             ]);
 
             $data = new Contact();
             $data->address = $request->address;
             $data->mobile = $request->mobile;
             $data->email = $request->email;
             $data->facebook = $request->facebook;
             $data->twitter = $request->twitter;
             $data->youtube = $request->youtube;
             $data->save();

 
             return redirect()->route('contact.view')->with('message','save info successfully');
 
     }
 
     public function edit($id){
          $editdata = Contact::find($id);
          return view('backend.contact.add-contact',compact('editdata'));
     }
 
     public function update(Request $request,$id){
             $data=Contact::find($id);
             $data->address = $request->address;
             $data->mobile = $request->mobile;
             $data->email = $request->email;
             $data->facebook = $request->facebook;
             $data->twitter = $request->twitter;
             $data->youtube = $request->youtube;
             $data->save();
             return redirect()->route('contact.view')->with('message','update info successfully');
 
      }
 
      public function delete($id){
          $data = Contact::find($id);
          $data->delete();
          return redirect()->route('contact.view')->with('message','Delete Data successfully');
 
      }
}
