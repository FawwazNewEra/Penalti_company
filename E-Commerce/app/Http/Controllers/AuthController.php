<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        if (auth()->check()) {
            return redirect('welcome');
      }else {
           return redirect('/');
      }
    
    }
    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('index');
        }else {
            return redirect('/')->with('error_messege', 'wrong email or password');
        }
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        
    
        return redirect('/');
    }
    

    
    public function register(Request $request) {
        $request->validate([
            'name' => 'min:2|max:10',
            'email' => 'email|unique:users',
            'password' => 'min:2|confirmed',
        ]);
    
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
    
        return redirect('/');
    
    }
}
