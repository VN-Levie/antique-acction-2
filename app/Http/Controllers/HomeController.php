<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $models = ['addresses'];
        if (Auth::guest()) {
            $user_data = null;
        } else {
            $user_data = User::with($models)->find(Auth::id());
        }
        $data = [
            'user' => $user_data,

        ];
        return Inertia::render('HomePage', $data);
    }
}
