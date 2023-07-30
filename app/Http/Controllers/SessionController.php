<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        // Nạp trước model User liên quan đến model Session
        $models = ['createdBy', 'endedBy', 'interruptedBy','products'];
        $category_slug = $request->slug;
        $page = $request->page ?? 1;
        $auction_session = null;
        $per_page = 12;
        $category_name = 'All Sessions';
        if ($category_slug) {
            $category_name = DB::table('categories')->where('slug', $category_slug)->value('name');
            $category_name  = "Sessions in $category_name";
            $auction_session = Session::whereHas('category', function ($query) use ($category_slug) {
                $query->where('slug', $category_slug);
            })->with($models)->orderBy('created_at', 'desc')->paginate($per_page);
        } else {
            $category_name = 'All Sessions';
            $auction_session = Session::with($models)->orderBy('created_at', 'desc')->paginate($per_page);
        }


        $product_categories = DB::table('categories')->get();
        $data = [
            'auction_session' => $auction_session,
            'product_categories' => $product_categories,
            'category_slug' => $category_slug,
            'category_name' => $category_name,
            'page' => $page,
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Sessions/Index', $data);
    }
}
