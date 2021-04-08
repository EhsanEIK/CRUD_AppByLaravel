<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //for login view
    public function Login()
    {
        return view('login.login');
    }

    //for login authentication/confirmation
    public function Authenticate(Request $request)
    {
        $data = $request->only(['email', 'password']);
        if(Auth::attempt($data))
        {
            return redirect()->intended('dashboard');
        }
        else
        {
            return redirect()->to('login')->withErrors('Invalid Email & password');
        }
    }

    //for logout
    public function Logout()
    {
    	Auth::Logout();
    	return redirect()->to('login');
    }

    //for register view
    public function Register()
    {
        return view('login.register');
    }

    //for register new account
    public function Store(Request $request)
    {
        $formData = $request->only(['name', 'email']);
        $formData['password'] = Hash::make($request->get('password'));
        if(User::create($formData))
        {
            Session::flash('strong', 'Success!');
            Session::flash('message', 'User Created Successfully!');
        }
        return redirect()->route('login');
    }
}
