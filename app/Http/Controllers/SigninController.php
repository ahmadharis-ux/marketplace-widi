<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    function daftar(Request $request){
        // $validasiData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        //     'role' => 'required|in:customer',
        // ]);
        // $validasiData['password'] = Hash::make($validasiData['password']);
        // dd($validasiData);
        // // return redirect('/signin')->with('message','Silahkan Login');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'role' => 'in:customer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/signin');
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
