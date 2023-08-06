<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\PostCategories;

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

    public function store(Request $request)
    {
        $Categories = PostCategories::all();
        return Inertia::render('Dashboard/Post/Create', ['Categories'=> $Categories]);
    }

    // public function store(Request $request)
    // {
    //     // Phương thức lưu thông tin từ form tạo mới
    // }
}
