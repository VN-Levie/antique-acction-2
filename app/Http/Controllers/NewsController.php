<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        return Inertia::render('News/News', []);
    }

    public function show()
    {
        $Datanews = DB::table('post')
        ->join('users', 'users.id', '=', "post.author")
        ->select('post.id','post.title','post.thumbnail','post.content', 'post.description','post.tag','users.name')->get();
        return response()->json($Datanews);
    }
}
