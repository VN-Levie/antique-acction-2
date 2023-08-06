<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Home/Profile/ShowUser', [
            'user' => $user,
            'address' => $user->addresses, // Assuming you want to pass the first address of the user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return Inertia::render('Home/Profile/Edit', [
            'user' => $user,
            'addresses' => $user->addresses,
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|numeric|min:10',

        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phoneNumber = $request->input('phoneNumber');
        // Update other fields as needed
        $request->user()->save();

        // Optionally, you can update the addresses here if needed.

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);
        $user = $request->user();
        Auth::guard('web')->logout();
        // $user = Auth::user();
        $user->delete();

        // Log out the user after deleting their account
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
