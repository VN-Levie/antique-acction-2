<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\Appraiser;
use App\Models\FeedBack;


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

        $DataTeam = Appraiser::limit(3)->get();

        $TestimonialData = FeedBack::with('author')->limit(5)->get();

        $data = [
            // 'user' => $user_data,
            'DataTeam' => $DataTeam,
            'TestimonialData' => $TestimonialData
        ];
        return Inertia::render('HomePage', $data);
    }
}
