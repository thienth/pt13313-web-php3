<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function loginForm(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
            return redirect()->route('homepage');
        }
        return redirect()->route('login')->with('errmsg', 'Sai thông tin tài khoản/mật khẩu');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
