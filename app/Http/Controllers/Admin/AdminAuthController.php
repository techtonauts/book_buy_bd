<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'superadmin' || Auth::user()->user_type === 'moderator') {
                $request->session()->regenerate();
                return redirect()->route('admin.show.index')->with('success', 'Login successful. Welcome back!');
            } else {
                // User is not an admin
                Auth::logout();
                throw ValidationException::withMessages(['credentials' => 'You are not authorized to access this area!']);
            }
        }
        throw ValidationException::withMessages(['credentials' => 'Invalid credentials!']);
        return redirect()->route('admin.show.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.show.login')->with('success', 'Logout successful!');
    }
}
