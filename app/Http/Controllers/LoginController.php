<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = ['username' => $request->username, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            if (Auth::guard('admin')->attempt($credentials)) {
                $user = Auth::guard('admin')->user();

                $roleRedirects = [
                    'super admin' => 'dashboard',
                    'admin tenant 1' => 'responden',
                    'admin tenant 2' => 'tenant',
                ];

                if (array_key_exists($user->role, $roleRedirects)) {
                    // dd($user);
                    return redirect()->intended($roleRedirects[$user->role]);
                } else {
                    return redirect('/login')->with('message', 'Role tidak valid');
                }
            } 
        } else {
            return redirect('/login')->with('message', 'Username atau password salah');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
