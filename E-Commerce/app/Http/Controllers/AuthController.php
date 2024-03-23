<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('/');
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
            'firstname' => 'min:2|max:10',
            'lastname' => 'min:2|max:10',
            'number' => 'min:2|max:15',
            'email' => 'email|unique:users',
            'password' => 'min:2|confirmed',
        ]);
    
        User::create([
            'fisrtname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
    
        return redirect('login');
    
    }
}
