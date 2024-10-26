<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $recipes = Recipes::where('user_id', Auth::id())->with('ingredients')->get();

        return Inertia::render('User/Index', [
            'user' => Auth::user(),
            'recipes' => $recipes,
        ]);
    }
    public function edit()
    {
        return Inertia::render('User/Edit', [
            'user' => Auth::user(),
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'password' => 'required',
           'avatar' => 'mimes:jpeg,jpg,png'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return Redirect::route('home');
    }
}
