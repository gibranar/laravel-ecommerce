<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect('/products');
        }

        return redirect('/login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
