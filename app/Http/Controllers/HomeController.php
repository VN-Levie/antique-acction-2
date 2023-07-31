<?php

namespace App\Http\Controllers;

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
        $data = [
            'user' => User::with($models)->find(Auth::id()),
        ];
        return Inertia::render('HomePage', $data);
    }
}
