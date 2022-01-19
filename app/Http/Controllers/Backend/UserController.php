<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Session;

class UserController extends Controller
{
   public function view(){
       $data['alldata'] = User::where('usertype','admin')->where('status','1')->get();
       return view('backend.user.view-user',$data);
   }

   public function add(){
        return view('backend.user.add-user');
   }

   public function store(Request $request){
            $this->validate($request,[
                'role'=> 'required',
                'name'=> 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required|min:8',
            ]);

            $data = new User();
            $data->usertype = "Admin";
            $data->role = $request->role;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->name = $request->name;
            $data->save();

            return redirect()->route('user.view')->with('message','save info successfully');

    }

    public function edit($id){
         $data = User::find($id);
         return view('backend.user.edit-user',compact('data'));
    }

    public function update(Request $request,$id){
        $editData =User::find($id);
        $editData->role = $request->role;
        $editData->name = $request->name;
        $editData->email = $request->email;
        $editData->password = bcrypt($request->password);
        $editData->save();

        return redirect()->route('user.view')->with('message','update info successfully');

     }

     public function delete($id){
         $data = User::find($id);
         $data->delete();
         return redirect()->route('user.view')->with('message','Delete Data successfully');

     }

}
