<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login ()
    {
        return view('Auth.login');
    }

    public function auth(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('panelAdmin.index');
        }

        return back()->with("mensage" , "credenciales incorrectas");
        return $request->all();
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
