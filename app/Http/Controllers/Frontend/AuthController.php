<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function showLogin(Request $request)
    {
        // Handle login logic here
        return view('auth.login');
    }

    public function showRegister(Request $request)
    {
        // Handle registration logic here
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('show.home')->with('success', 'Login successful. Welcome back!');
        }
        throw ValidationException::withMessages(['credentials' => 'Invalid credentials!']);
        return redirect()->route('show.login');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'user_type' => 'user',
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->route('show.home')->with('success', 'Registration successful. Welcome!');
        } else {
            return redirect()->route('show.register')->with('error', 'Registration failed. Please try again!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login')->with('success', 'Logout successful!');
    }
}
