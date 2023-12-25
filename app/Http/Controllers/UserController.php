<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\userLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function handleRegistration(User $user, createUserRequest $request)
    {
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('accueil')->with('success', "Compte créé, connectez-vous");
    }

    public function login()
    {
        return view('users.login');
    }

    public function handleLogin(Request $userLoginRequest)
    {

        $credentials = $userLoginRequest->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $userLoginRequest->session()->regenerate();

            return redirect()->intended('home');
        } else {
            return redirect()->back()->with('error', "Informations non reconnues");
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
