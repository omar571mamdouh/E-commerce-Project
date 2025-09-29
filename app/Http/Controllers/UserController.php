<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // استدعاء الموديل
use Illuminate\Support\Facades\Hash; // تشفير الباسورد
use \Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerdisplay()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate and process the registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // تشفير الباسورد
        ]);

        return redirect()->route('login.view')->with('success', 'Registration successful! Please log in.');
    }

    public function logindisplay()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/products')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
