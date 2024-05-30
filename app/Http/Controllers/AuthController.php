<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Add this line to import the User model
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    // Handle login
public function login(Request $request)
{
    // Manually set email and password for login attempt
    $credentials = [
        'email' => 'zagros@gmail.com',
        'password' => '12345',
    ];

    // Attempt to authenticate user
    if (Auth::attempt($credentials)) {
        // Authentication passed, redirect to home page
        return redirect('/');
    }

    // Authentication failed, redirect back with error message
    return redirect()->back()->with('error', 'Invalid email or password');
}



    // Handle user registration
    // Controller logic for user registration
    public function signup(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        // Create new user with hashed password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);
    
        // Redirect to home page after signup
        return redirect('/')->with('success', 'Your account has been created. Please log in.');
    }

}
