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
}
