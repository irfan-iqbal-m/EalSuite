<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && \Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login_error' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}

