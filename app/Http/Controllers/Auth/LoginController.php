<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Maestro;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //dd($credentials, Maestro::where('email', $credentials['email'])->first());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirección basada en rol
            if (Auth::user()->rol == 0) {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/usuario');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }
}
