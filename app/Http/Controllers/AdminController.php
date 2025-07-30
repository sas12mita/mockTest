<?php

namespace App\Http\Controllers;

use \Log;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
        // Automatic validation - will redirect back on failure
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Only try-catch for the auth attempt
        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            return back()
                ->withErrors(['email' => 'Invalid credentials'])
                ->withInput($request->only('email'));
        } catch (\Exception $e) {
            return back()
                ->withErrors(['email' => 'Login service unavailable'])
                ->withInput($request->only('email'));
        }
    }
    public function adminlogout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('index')
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }
     public function dashboard()
     {
        return view ('dashboard');
     }
}
