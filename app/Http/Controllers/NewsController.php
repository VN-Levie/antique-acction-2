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

    public function Detailpost($id)
    {
        $newsDetail = $this->newsDetail($id);
        return Inertia::render('News/NewsDetail', ['newsDetail' => $newsDetail]);
    }

    public function show()
    {
        $Datanews = DB::table('post')
            ->join('users', 'users.id', '=', "post.author")
            ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.tag', 'users.name')->get();
        return response()->json($Datanews);
    }

    public function newsDetail($id)
    {
        $newsDetail = DB::table('post')
            ->join('users', 'users.id', '=', "post.author")
            ->where('post.id', $id)
            ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.tag', 'users.name')
            ->first();
        return response()->json($newsDetail);
    }
}
