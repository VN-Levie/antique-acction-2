<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(Request $request)
    {

        $data = [];
        return Inertia::render('Home/Products/Index', $data);
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
