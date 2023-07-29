<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {

        $auction_session = Session::all();
        $product_categories = DB::table('categories')->get();
        $data = [
            'auction_session' => $auction_session,
            'product_categories' => $product_categories
        ];

        return Inertia::render('Sessions/Index', $data);
    }
}
