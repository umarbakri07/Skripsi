<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        //dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Mendapatkan user yang terotentikasi

            // Cek level pengguna dan redirect sesuai dengan level
            if ($user->level === 'admin') {
                return redirect('/dashboard');
            }

            // Jika level tidak sesuai, atur redirect default ke halaman index
            return redirect('/');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
