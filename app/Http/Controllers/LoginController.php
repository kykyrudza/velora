<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Authentication/Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return Inertia::render('Authentication/Login', [
            'errors' => [
                'email' => 'Неверный email или пароль.',
                'password' => 'Неверный email или пароль.',
            ],
            'form' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ],
        ]);
    }
}

