<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\PostCategories;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $category_post = $request->name;


        if ($category_post) {
            $categoryName = PostCategories::where('post_categories.name', $category_post)
                ->pluck('post_categories.id')
                ->first();
            $Datanews = Post::where('Post.category', $categoryName)
                ->join('users', 'users.id', '=', "post.author")
                ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.created_at', 'post.tag', 'users.name')
                ->get();
        } else {
            $Datanews = Post::join('users', 'users.id', '=', "post.author")
                ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.created_at', 'post.tag', 'users.name')
                ->get();
        }



        $Categories = DB::table('post_categories')->get();

        $latestPosts = Post::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return Inertia::render('News/News', ['Posts' => $Datanews, 'Categories' => $Categories, 'latestPosts' => $latestPosts]);
    }

    public function Detailpost($id)
    {
        // $newsDetail = $this->newsDetail($id);
        $newsDetail = DB::table('post')
            ->join('users', 'users.id', '=', "post.author")
            ->where('post.id', $id)
            ->first();
        // dd($newsDetail->content);
        // return Inertia::render('News/NewsDetail', ['content' => $newsDetail->content], ['newsDetail' => $newsDetail]);
        return Inertia::render('News/NewsDetail', [
            'id' => $id,
            'title' => $newsDetail->title,
            'content' => $newsDetail->content,
            'newsDetail' => $newsDetail,
        ]);
    }

    public function show()
    {
        $Datanews = DB::table('post')
            ->join('users', 'users.id', '=', "post.author")
            ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.created_at', 'post.tag', 'users.name')->get();
        return response()->json($Datanews);
    }
}
