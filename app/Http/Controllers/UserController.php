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

    public function updateFirstName(Request $request)
    {
        $request->validate(['firstName' => 'required|string|max:255']);
        $user = Auth::user();
        $user->first_name = $request->firstName;
        $user->save();

        return response()->json(['success' => 'First name updated successfully.']);
    }

    public function updateLastName(Request $request)
    {
        $request->validate(['lastName' => 'required|string|max:255']);
        $user = Auth::user();
        $user->last_name = $request->lastName;
        $user->save();

        return response()->json(['success' => 'Last name updated successfully.']);
    }

    public function updateDescription(Request $request)
    {
        $request->validate(['description' => 'nullable|string|max:500']);
        $user = Auth::user();
        $user->description = $request->description;
        $user->save();

        return response()->json(['success' => 'Description updated successfully.']);
    }

    public function updateEmail(Request $request)
    {
        $request->validate(['email' => 'required|string|email|max:255|unique:users,email,' . Auth::id()]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return response()->json(['success' => 'Email updated successfully.']);
    }

    public function updateAvatar(Request $request)
    {
        $request->validate(['avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = 'storage/' . $path;
            $user->save();
        }

        return response()->json(['success' => 'Avatar updated successfully.']);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['success' => 'Password updated successfully.']);
        }

        return response()->json(['success' => 'Password was not updated.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return Redirect::route('home');
    }
}
