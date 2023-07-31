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
                ->select('id', 'title', 'thumbnail', 'content', 'description', 'created_at', 'tag', 'author')
                ->paginate($per_page);
        } else {
            $Datanews = Post::with('author') // Nạp trước thông tin người tạo bài viết
                ->select('id', 'title', 'thumbnail', 'content', 'description', 'created_at', 'tag', 'author')
                ->paginate($per_page);
        }

        $Categories = DB::table('post_categories')->get();

        $latestPosts = Post::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return Inertia::render('News/News', [
            'Posts' => $Datanews, 'Categories' => $Categories, 'latestPosts' => $latestPosts
        ]);
    }


    public function Detailpost($id = null)
    {
        // Lấy thông tin chi tiết của bài viết có id tương ứng
        $newsDetail = Post::where('post.id', $id)
            ->first();

        if ($newsDetail == null) {
            abort(404);
        }

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

        $Categories = PostCategories::get();

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
