<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\PostCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class NewDashboardController extends Controller
{
    public function index($search = null)
    {
        $per_page = 20;
        $query = Post::with('author')
            ->with('category');

        // Nếu có giá trị tìm kiếm, thêm điều kiện tìm kiếm vào query
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            });
        }
        $Datanews = $query->paginate($per_page);

        return Inertia::render('Dashboard/Post/Index', ['Posts' => $Datanews,]);
    }

    public function Create()
    {
        $Categories = PostCategories::all();
        return Inertia::render('Dashboard/Post/Create', ['Categories' => $Categories]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Retrieve data from the request
        $title = $request->input('title');
        $category = $request->input('category');
        $content = $request->input('content');

        // Create a slug from the title
        $slug = Str::slug($title);

        dd($title);

        // Process the thumbnail image
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('thumbnails', 'public');
        }

        // Create a new post in the database
        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->category = $category;
        $post->content = $content;
        $post->thumbnail = $thumbnailPath ?? null;
        $post->author = $user->id;
        $post->save();

        return redirect()->route('post.index')->with('success', 'add successfully.');;
    }
}
