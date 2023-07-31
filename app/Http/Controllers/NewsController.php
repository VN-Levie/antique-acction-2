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

        if ($category_post) {
            $categoryName = PostCategories::where('slug', $category_post)
                ->pluck('id')
                ->first();

            $Datanews = Post::whereHas('category', function ($query) use ($categoryName) {
                $query->where('id', $categoryName);
            })
                ->join('users', 'users.id', '=', 'post.author')
                ->select('post.id', 'post.title', 'post.thumbnail', 'post.content', 'post.description', 'post.created_at', 'post.tag', 'users.name')
                ->get();
        } else {
            $Datanews = Post::join('users', 'users.id', '=', 'post.author')
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
        // Lấy thông tin chi tiết của bài viết có id tương ứng
        $newsDetail = DB::table('post')
            ->join('users', 'users.id', '=', 'post.author')
            // ->with('author')
            // ->with('category')
            ->join('post_categories', 'post.category', '=', 'post_categories.id')
            ->select('post.*', 'users.name', 'post_categories.name as categoriesName', 'post_categories.slug as categoriesSlug')
            ->where('post.id', $id)
            ->first();

        // Lấy giá trị category của bài viết đó
        $categoryID = $newsDetail->category;

        $categorytag = PostCategories::where('id', $categoryID)
            ->select('post_categories.name',)->get();

        // Lấy danh sách các bài viết liên quan có cùng category ID, loại trừ bài viết hiện tại
        $relatedArticles = Post::where('category', $categoryID)
            // Loại trừ bài viết hiện tại khỏi danh sách bài viết liên quan
            ->where('id', '!=', $id)
            ->limit(3)
            ->get();

        $Categories = DB::table('post_categories')->get();

        $latestPosts = Post::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return Inertia::render('News/NewsDetail', [
            'id' => $id,
            'title' => $newsDetail->title,
            'content' => $newsDetail->content,
            'newsDetail' => $newsDetail,
            'Categories' => $Categories,
            'latestPosts' => $latestPosts,
            'relatedArticles' => $relatedArticles,
            'categorytag' => $categorytag
        ]);
    }
}
