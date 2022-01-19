<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $email    = $request->email;
        $password = $request->password;
        $validdata = User::where('email',$email)->first();
        $password_check = password_verify($password,@$validdata->password);
        if($password_check==false){
             return redirect()->back()->with('message','Email and password not currect');
        }
        if($validdata->status=='0'){
            return redirect()->back()->with('message','you should confirm your email');
        }
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('login');
        }
    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
