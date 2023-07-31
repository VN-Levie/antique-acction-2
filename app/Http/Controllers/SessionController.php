<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        // Nạp trước model User liên quan đến model Session
        $models = ['createdBy', 'endedBy', 'interruptedBy', 'products','category'];
        $category_slug = $request->slug;
        $page = $request->page ?? 1;
        $auction_session = null;
        $per_page = 12;
        $category_name = null;
        if ($category_slug) {
            $category_name = DB::table('categories')->where('slug', $category_slug)->value('name');
            if ($category_name == null) {
                abort(404);
            }
            $category_name  = "Sessions in $category_name";
            $auction_session = Session::whereHas('category', function ($query) use ($category_slug) {
                $query->where('slug', $category_slug);
            })->with($models)->orderBy('created_at', 'desc')->paginate($per_page);
        } else {
            $category_name = 'All Sessions';
            $auction_session = Session::with($models)->orderBy('created_at', 'desc')->paginate($per_page);
        }

        $auction_session->loadCount('products');
        $models = [];
        $product_categories = Category::with($models)->get();
        $product_categories->loadCount('sessions');
        $count = Session::count();
        $data = [
            'auction_session' => $auction_session,
            'product_categories' => $product_categories,
            'category_slug' => $category_slug,
            'category_name' => $category_name,
            'page' => $page,
            'count' => $count,
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Home/Sessions/Index', $data);
    }
    public function show(Request $request, $slug = null, $session_slug = null)
    {
        if ($session_slug == null) {
            return redirect()->route('session.index');
        }
        // dd($id);
        // Nạp trước model User liên quan đến model Session
        $models = ['createdBy', 'endedBy', 'interruptedBy', 'products'];
        $auction_session = Session::with($models)->where('slug', $session_slug)->first();
        if ($auction_session == null && $session_slug != null) {
            abort(404);
        }
        $auction_session->loadCount('products');
        // $auction_session->loadCount('bids');
        // $auction_session->loadCount('interrupts');
        // $auction_session->loadCount('ends');
        $data = [
            'auction_session' => $auction_session,
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Home/Sessions/Show', $data);
    }
}
