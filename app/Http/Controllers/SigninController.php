<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SigninController extends Controller
{
    function index(){
        return Inertia::render('Auth/SignIn');
    }
    function signup(){
        return Inertia::render('Auth/SignUp');
    }
    function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $loginAttempt =  (Auth::attempt($credentials));

        if (!$loginAttempt) {
            return redirect()->back()->with('error', "Kredensial salah!");
        }
        $user = Auth::user();

        if ($user->role == 'customer') {
            return redirect()->intended('/');
        } elseif ($user->role == 'admin') {
            return redirect()->intended('admin');
        }
        return redirect('/blank');
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
