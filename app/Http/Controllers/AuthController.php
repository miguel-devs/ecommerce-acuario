<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{
    function show(){
        return Inertia::render('Auth/Login', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'canResetPassword' =>Route::has("password.request"),
            
        ]);

    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

      

        if (Auth::attempt($credentials)) {
            
            echo "Valido";
            //return redirect()->intended('dashboard');
        } else{
            echo "inválido";
        }
    }
}
