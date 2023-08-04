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
        $category_post = $request->slug;
        $per_page = 5;
        $Datanews = null;

        if ($category_post) {
            $category = PostCategories::where('slug', $category_post)->first();

            if (!$category) {
                abort(404);
            }

            $Datanews = Post::where('category', $category->id)
                ->with('author') // Nạp trước thông tin người tạo bài viết
                ->with('category')
                ->paginate($per_page);
        } else {
            $Datanews = Post::with('author') // Nạp trước thông tin người tạo bài viết
                ->with('category')
                ->paginate($per_page);
        }
        $Categories = PostCategories::get();

        $latestPosts = Post::orderBy('created_at', 'desc')
            ->with('category')
            ->limit(5)
            ->get();

        return Inertia::render('News/News', [
            'Posts' => $Datanews,
            'Categories' => $Categories,
            'latestPosts' => $latestPosts
        ]);
    }


    public function Detailpost(Request $request, $slug = null, $news_slug = null)
    {
        if ($news_slug == null) {
            return redirect()->route('news.index');
        }

        // Lấy thông tin chi tiết của bài viết tương ứng
        $newsDetail = Post::where('slug', $news_slug)
            ->with('category')
            ->first();

        Post::where('id',  $newsDetail->id)
            ->increment('count_view');

        if ($newsDetail == null) {
            abort(404);
        }

        $topViewedPosts = Post::with('category')
        ->orderBy('count_view', 'desc')->take(3)->get();


        //Lấy thông tin id của post
        $categoryID = $newsDetail->category;

        //Lấy thông tin liên quan của bài viết tương ứng
        $relatedArticles = Post::where('category', $categoryID)
            ->with('category')
            ->limit(3)
            ->get();

        $Categories = PostCategories::get();

        $latestPosts = Post::orderBy('created_at', 'desc')
            ->with('category')
            ->limit(5)
            ->get();

        return Inertia::render('News/NewsDetail', [
            'newsDetail' => $newsDetail,
            'Categories' => $Categories,
            'latestPosts' => $latestPosts,
            'relatedArticles' => $relatedArticles,
            'topViewedPosts' => $topViewedPosts
        ]);
    }
}
