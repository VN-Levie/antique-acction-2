<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\PostCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
        try {
            $user = Auth::user();

            $request->validate([
                'title' => 'required|max:255',
                'category' => 'required', // Thay bằng các validation rules phù hợp cho category
                'content' => 'required',
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra tệp ảnh
            ]);

            $title = $request->input('title');
            $category = $request->input('category');
            $content = $request->input('content');

            $slug = Str::slug($title);

            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');

                // Move the thumbnail to the desired directory
                $thumbnail->move(public_path('img/post'), $thumbnail->getClientOriginalName());
            }

            $post = new Post();
            $post->title = $title;
            $post->slug = $slug;
            $post->category = $category;
            $post->content = $content;
            $post->thumbnail = $thumbnailPath;
            $post->author = $user->id;
            $post->save();

            return to_route('post.index');;
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'An error occurred while adding the post.']);
        }
    }


    public function editpost($id)
    {
        $post = Post::with('author')
            ->with('category')
            ->findOrFail($id);
        $Categories = PostCategories::all();
        return Inertia::render('Dashboard/Post/EditPost', ['post' => $post, 'Categories' => $Categories]);
    }


    public function edit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|integer',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example image file types
        ]);

        $id =  $validatedData['id'];
        // Find the post to update
        $post = Post::findOrFail($id);

        // Update post data
        $post->title = $validatedData['title'];
        $post->category = $validatedData['category'];
        $post->content = $validatedData['content'];

        if ($request->hasFile('thumbnail')) {
            // Handle thumbnail upload
            $thumbnailPath = $validatedData['thumbnail']->store('thumbnails', 'public');
            $post->thumbnail = $thumbnailPath;
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }
}
