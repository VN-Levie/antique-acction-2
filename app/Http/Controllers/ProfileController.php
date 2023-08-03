<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function index()
    {
        $user = Auth::user();

        // Load the addresses relationship
        $user->load('addresses');


        return Inertia::render('Home/Profile/Index', [
            'user' => $user,
            'address' => $user->addresses, // Assuming you want to pass the first address of the user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        // Load the addresses relationship
        $user->load('addresses');

        // Debugging: Check if the user and addresses data is loaded correctly


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
            // Add validation rules for other fields as needed
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed
        $user->save();

        // Optionally, you can update the addresses here if needed.

        return redirect()->route('profile.index');
    }
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        // Log out the user after deleting their account
        Auth::logout();

        return redirect()->route('home');
    }
}
