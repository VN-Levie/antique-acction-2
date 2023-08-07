<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Events\BidSent;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidding;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        // Nạp trước model User liên quan đến model Session
        $models = ['session', 'category', 'appraised_by'];
        $category_slug = $request->slug;
        $page = $request->page ?? 1;
        $products = null;
        $per_page = 12;
        $category_name = null;
        //search filter
        $product_name = $request->product_name ?? null;
        $date_start = $request->date_start ?? 'all';
        // if ($date_start != null) {
        //     if ($date_start == 'today') {
        //         $date_start = date('Y-m-d');
        //     } else if ($date_start == 'next_7_days') {
        //         $date_start = date('Y-m-d', strtotime('+7 days'));
        //     } else if ($date_start == 'next_30_days') {
        //         $date_start = date('Y-m-d', strtotime('+30 days'));
        //     } else if ($date_start == 'prev_7_days') {
        //         $date_start = date('Y-m-d', strtotime('-7 days'));
        //     } else if ($date_start == 'prev_30_days') {
        //         $date_start = date('Y-m-d', strtotime('-30 days'));
        //     } else {
        //         $date_start = null;
        //     }
        // } // dd($date_start);
        if ($category_slug) {
            $category_name = DB::table('categories')->where('slug', $category_slug)->value('name');
            if ($category_name == null) {
                abort(404);
            }
            $category_name = "Product in $category_name";
            $products = Product::whereHas('category', function ($query) use ($category_slug) {
                $query->where('slug', $category_slug);
            })->whereHas('session', function ($query) use ($date_start) {
                if ($date_start != null) {
                    if ($date_start == 'today') {
                        $query->whereDate('start_at', '=', date('Y-m-d'));
                    } elseif ($date_start == 'next_7_days') {
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d', strtotime('+7 days')));
                    } elseif ($date_start == 'next_30_days') {
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d', strtotime('+30 days')));
                    } elseif ($date_start == 'prev_7_days') {
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-7 days')));
                    } elseif ($date_start == 'prev_30_days') {
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-30 days')));
                    } else {
                        $query->whereDate('start_at', '>=', date('Y-m-d'));
                    }
                } else {
                    $query->whereDate('start_at', '>=', date('Y-m-d'));
                }
            })->with($models)->when($product_name, function ($query, $product_name) {
                return $query->where('name', 'like', '%' . $product_name . '%');
            })->orderByRaw('(SELECT start_at FROM auction_session WHERE products.auction_id = auction_session.id)')->paginate($per_page);
        } else {
            $category_name = 'All Product';
            $models = ['session', 'category', 'appraised_by'];
            $products = Product::with($models)->whereHas('session', function ($query) use ($date_start) {
                if ($date_start != null) {
                    if ($date_start == 'today') {
                        $query->whereDate('start_at', '=', date('Y-m-d'));
                    } elseif ($date_start == 'next_7_days') {
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d', strtotime('+7 days')));
                    } elseif ($date_start == 'next_30_days') {
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d', strtotime('+30 days')));
                    } elseif ($date_start == 'prev_7_days') {
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-7 days')));
                    } elseif ($date_start == 'prev_30_days') {
                        $query = $query->whereDate('start_at', '<=', date('Y-m-d'));
                        $query = $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-30 days')));
                    } else {
                        $query->whereDate('start_at', '>=', date('Y-m-d'));
                    }
                } else {
                    $query->whereDate('start_at', '>=', date('Y-m-d'));
                }
            })->when($product_name, function ($query, $product_name) {
                return $query->where('name', 'like', '%' . $product_name . '%');
            })->orderByRaw('(SELECT start_at FROM auction_session WHERE products.auction_id = auction_session.id)')->paginate($per_page);
        }
        //appends để giữ lại các tham số trên url khi phân trang
        $products->appends($request->all());
        //sắp xếp theo ngày bắt đầu phiên đấu giá

        // $products = $products->data->sortBy(function ($product) {
        //     return $product->session->start_at;
        // });
        // dd($products);

        $count_today = 0;
        $count_week = 0;
        $count_month = 0;
        //Đếm product thuộc session có ngày bắt đầu là hôm nay
        $count_today = Product::whereHas('session', function ($query) {
            $query->whereDate('start_at', '=', date('Y-m-d'));
        })->count();
        //Đếm product thuộc session có ngày bắt đầu là tuần này
        $count_week = Product::whereHas('session', function ($query) {
            $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-7 days')));
        })->count();
        //Đếm product thuộc session có ngày bắt đầu là tháng này
        $count_month = Product::whereHas('session', function ($query) {
            $query->whereDate('start_at', '>=', date('Y-m-d', strtotime('-30 days')));
        })->count();
        // dd($products);
        // $products->loadCount('products');
        $filter_date = [
            ['slug' => 'all', 'display_name' => 'All Available', 'count' => 0],
            ['slug' => 'prev_30_days', 'display_name' => 'Last 30 Days', 'count' => $count_month],
            ['slug' => 'prev_7_days', 'display_name' => 'Last 7 Days', 'count' => $count_week],
            ['slug' => 'today',  'display_name' => 'Today', 'count' => $count_today],
            ['slug' => 'next_7_days', 'display_name' => 'Next 7 Days', 'count' => $count_week],
            ['slug' => 'next_30_days', 'display_name' => 'Next 30 Days', 'count' => $count_month],


        ];
        $models = ['products'];
        $product_categories = Category::with($models)->get();
        $product_categories->loadCount('products');
        $count = Product::count();
        $data = [
            'products' => $products,
            'product_categories' => $product_categories,
            'category_slug' => $category_slug,
            'category_name' => $category_name,
            'page' => $page,
            'count' => $count,
            'filter_date' => $filter_date,

        ];
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
        $products = Session::with($models)->where('slug', $session_slug)->first();
        if ($products == null && $session_slug != null) {
            abort(404);
        }
        $products->loadCount('products');
        // $products->loadCount('bids');
        // $products->loadCount('interrupts');
        // $products->loadCount('ends');
        $data = [
            'products' => $products,
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Home/Sessions/Show', $data);
    }
    public function view(Request $request, $session_slug = null, $id = null)
    {
        if ($session_slug == null) {
            abort(404);
        }
        if ($id == null && $session_slug != null) {
            abort(404);
        }
        $session = Session::where('slug', $session_slug)->first();
        if ($session == null) {
            abort(404);
        }
        $models = ['session', 'biddings', 'last_bid'];
        $product = Product::with($models)
            ->where('id', $id)
            ->where('auction_id', $session->id)
            ->first();
        if ($product == null) {
            abort(404);
        }
        $product->loadCount('biddings');
        $data = [
            'product' => $product,
        ];
        // if(Auth::user() != null){
        //     broadcast(new BidSent(Auth::user(), $product, $session))->toOthers();
        // }

        return Inertia::render('Home/Products/Show', $data);
    }

    public function test(Request $request, $id = null)
    {
        $user = Auth::user();
        if ($user == null) {
            return response()->json([
                'status_code' => 'error',
                'message' => 'You must login to bid',
            ], 200);
        }
        //TODO: check user is verified and ekyc
        $bid = $request->bid;

        $models = ['session', 'biddings', 'last_bid'];
        $product = Product::with($models)
            ->where('id', $id)
            ->first();

        if ($product == null) {
            return response()->json([
                'status_code' => 'error',
                'message' => 'Product not found',
            ], 404);
        }
        if ($product->status != 1) {
            return response()->json([
                'status_code' => 'error',
                'message' => 'Product currently not available. Please try again later',
            ], 200);
        }
        if ($bid < $product->start_price) {
            return response()->json([
                'status_code' => 'error',
                'message' => 'Bid must be greater than current price',
            ], 200);
        }
        if ($product->last_bid != null && $bid < $product->last_bid->price_bided) {
            return response()->json([
                'status_code' => 'error',
                'message' => 'Bid must be greater than current price',
            ], 200);
        }

        $now = date('Y-m-d H:i:s');
        $bidding = new Bidding();
        $bidding->user_id = $user->id;
        $bidding->product_id = $product->id;
        $bidding->price_bided = $bid;
        $bidding->created_at = $now;
        $bidding->updated_at = $now;
        $bidding->save();

        $product->last_bid_id = $bidding->id;
        $product->save();

        broadcast(new BidSent(Auth::user(), $product, $product->session, $bid));
        return response()->json([
            'status_code' => 'success',
            'message' => 'Place bid successfully',
        ], 200);

    }
}
