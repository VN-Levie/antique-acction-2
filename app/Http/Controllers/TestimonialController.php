<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index () {
        $TestimonialData = DB::table('feedback')->
        join('users', 'users.id', '=', "feedback.author")
        ->select('feedback.*', 'users.name')->get();

        return response()->json($TestimonialData);
    }
}
