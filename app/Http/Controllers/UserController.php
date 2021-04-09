<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPage(){
        if (Auth::check()){
            return redirect()->route('dashboard');
        }else {
            return view('login');
        }
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with(['message_err' => 'Invalid Username or Password!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
