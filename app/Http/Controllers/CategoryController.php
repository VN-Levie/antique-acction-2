<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(int $id)
    {
        return Inertia::render('Category/Category', [
            'category_name' => Category::find($id),
        ]);
    }
}
