<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AdminSessionController extends Controller
{
    public function viewLogin()
    {
        try {
            return view('');
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('');
            }

            return back()->with('error', 'Email atau password salah')->with($request->only('email'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->with($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        try {
            auth()->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
