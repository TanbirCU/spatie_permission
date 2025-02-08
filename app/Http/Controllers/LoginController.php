<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        $credentials = request()->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('users.index');
        }
        return redirect()->route('login')->with('message', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
