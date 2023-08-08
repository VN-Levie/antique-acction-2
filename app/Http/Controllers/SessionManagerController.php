<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionManagerController extends Controller
{
    public function index(Request $request)
    {
        // Nạp trước model User liên quan đến model Session
        $models = ['createdBy', 'endedBy', 'interruptedBy', 'products', 'category'];
        $category_slug = $request->category_slug ?? 'all';
        $search = $request->search ?? null;
        $page = $request->page ?? 1;
        $auction_sessions = null;
        $per_page = 50;
        $category_name = null;
        if ($category_slug && $category_slug != 'all') {
            $category_name = DB::table('categories')->where('slug', $category_slug)->value('name');
            if ($category_name == null) {
                abort(404);
            }
            $category_name  = "Sessions in $category_name";
            $auction_sessions = Session::whereHas('category', function ($query) use ($category_slug) {
                $query->where('slug', $category_slug);
            })
                ->with($models)->when($search, function ($query, $search) {
                    return $query
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')->paginate($per_page);
        } else {
            $category_name = 'All Sessions';
            $auction_sessions = Session::with($models)->when($search, function ($query, $search) {
                return $query
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate($per_page);
        }
        $auction_sessions->appends($request->all());
        $auction_sessions->loadCount('products');
        $models = [];
        $product_categories = Category::with($models)->get();
        $product_categories->loadCount('sessions');
        $count = Session::count();
        $data = [
            'auction_sessions' => $auction_sessions,
            'product_categories' => $product_categories,
            'category_slug' => $category_slug,
            'search' => $search,
            'category_name' => $category_name,
            'page' => $page,
            'count' => $count,
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Dashboard/Session/Index', $data);
    }
    public function create(Request $request)
    {


        $models = [];
        $product_categories = Category::with($models)->get();

        $data = [
            'product_categories' => $product_categories,
        ];


        return Inertia::render('Dashboard/Session/CreateSession', $data);
    }

    public function edit(Request $request, $id = null)
    {
        if ($id == null) {
            return redirect()->route('dashboard.session.index');
        }
        $models = ['createdBy', 'endedBy', 'interruptedBy', 'products', 'category'];
        $session = Session::with($models)->find($id);
        if ($session == null) {
            return redirect()->route('dashboard.session.index');
        }


        $models = [];
        $product_categories = Category::with($models)->get();

        $data = [
            'product_categories' => $product_categories,
            'session' => $session,
            'id' => $id,
        ];


        return Inertia::render('Dashboard/Session/EditSession', $data);
    }
    public function show(Request $request, $id = null)
    {
        if ($id == null) {
            return redirect()->route('dashboard.session.index');
        }
        $per_page = 50;
        $models = ['createdBy', 'endedBy', 'interruptedBy', 'products', 'category'];
        $session = Session::with($models)->find($id);
        
        if ($session == null) {
            // dd('ss null id'.$id);
            return redirect()->route('dashboard.session.index');
        }
        $list_products = $session->products()->with('category')->paginate($per_page);


        $models = [];
        $product_categories = Category::with($models)->get();

        $data = [
            'product_categories' => $product_categories,
            'session' => $session,
            'id' => $id,
            'list_products' => $list_products,
        ];


        return Inertia::render('Dashboard/Session/Show', $data);
    }
    public function update(Request $request, $id = null)
    {
        
        if ($id == null) {
            return response()->json(['status_code' => 0, 'message' => "Session not founda"]);
        }
        if (!Auth::user()) {
            return response()->json(['status_code' => 0, 'message' => "Login session expired. Please login again."]);
        }
        $user = User::find(Auth::user()->id);
        if ($user->role != 5) {
            return response()->json(['status_code' => 0, 'message' => "You don't have permission to delete this session."]);
        }
        $session_name = $request->session_name;
        $session_slug = $request->session_slug;
        $description = $request->description;
        $category_id = $request->category_id;
        $start_time = $request->date_start;
        $end_time = $request->date_end;
        $payment_and_shipping = $request->payment_and_shipping;
        $goal = $request->goal;
        $thumbnail = $request->thumbnail;
        if ($thumbnail != null) {
            $thumb_base64 = $thumbnail['result'];
            $thumbnail_name = $request->thumbnail_name;
        }

        // dd($thumbnail_name);
        if ($session_name == null || $session_slug == null || $description == null || $category_id == null || $start_time == null || $end_time == null || $payment_and_shipping == null || $goal == null) {
            return response()->json([
                'message' => 'Please fill all the fields',
                'status_code' => 0,
            ]);
        }
        $session = Session::find($id);
        if ($session == null) {
            return response()->json(['status_code' => 0, 'message' => "Session not found.1"]);
        }
        //check date today
        $today = date('Y-m-d H:i:s');
        if ($start_time < $today && $start_time != $session->start_time) {
            return response()->json(['status_code' => 0, 'message' => "Start time can't be before today."]);
        }
        //check date
        $start_time_check = strtotime($start_time);
        $end_time_check = strtotime($end_time);
        if ($start_time_check >= $end_time_check) {
            return response()->json(['status_code' => 0, 'message' => "Start time must be before end time."]);
        }

        try {
            //check slug
            $check_slug = Session::where('slug', $session_slug)
                ->where('id', '!=', $id)
                ->first();

            if ($check_slug != null) {
                return response()->json(['status_code' => 0, 'message' => "Slug has been used."]);
            }




            if ($thumbnail != null) {
                //check thumbnail name
                $img_ext = explode('.', $thumbnail_name);
                $img_ext = end($img_ext);
                $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
                if (!in_array($img_ext, $allowed_ext)) {
                    return response()->json(['status_code' => 0, 'message' => "File extension is not allowed."]);
                }
                if ($this->is_image($thumb_base64) == false) {
                    return response()->json(['status_code' => 0, 'message' => "File is not an image."]);
                }
                //upload file

                $thumb_name = $session_slug . '-' . time() . '.' . $img_ext;
                $thumb_path = public_path() . '/uploads/session_thumbnail/' . $thumb_name;
                $thumb_path_db = '/uploads/session_thumbnail/' . $thumb_name;
                file_put_contents($thumb_path, file_get_contents($thumb_base64));
                $thumbnail['result'] = $thumb_path_db;
            } else {
                $thumb_path_db = $session->thumbnail;
            }


            $session->name = $session_name;
            $session->slug = $session_slug;
            $session->description = $description;
            $session->category_id = $category_id;
            $session->start_at = $start_time;
            $session->end_at = $end_time;
            $session->payment_and_shipping = $payment_and_shipping;
            $session->goal = $goal;
            $session->thumbnail = $thumb_path_db;
            $session->save();
            return response()->json([
                'message' => 'Update session successfully',
                'status_code' => 1,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function store(Request $request)
    {
        $session_name = $request->session_name;
        $session_slug = $request->session_slug;
        $description = $request->description;
        $category_id = $request->category_id;
        $start_time = $request->date_start;
        $end_time = $request->date_end;
        $payment_and_shipping = $request->payment_and_shipping;
        $goal = $request->goal;
        $thumbnail = $request->thumbnail;
        $thumb_base64 = $thumbnail['result'];
        $thumbnail_name = $request->thumbnail_name;
        // dd($thumbnail_name);
        if ($session_name == null || $session_slug == null || $description == null || $category_id == null || $start_time == null || $end_time == null || $payment_and_shipping == null || $goal == null || $thumbnail == null) {
            return response()->json([
                'message' => 'Please fill all the fields',
                'status_code' => 0,
            ]);
        }
        //check date today
        $today = date('Y-m-d H:i:s');
        if ($start_time < $today) {
            return response()->json(['status_code' => 0, 'message' => "Start time can't be before today."]);
        }
        //check date
        $start_time_check = strtotime($start_time);
        $end_time_check = strtotime($end_time);
        if ($start_time_check >= $end_time_check) {
            return response()->json(['status_code' => 0, 'message' => "Start time must be before end time."]);
        }

        try {
            //check slug
            $check_slug = Session::where('slug', $session_slug)->first();
            if ($check_slug != null) {
                return response()->json(['status_code' => 0, 'message' => "Slug has been used."]);
            }
            //check thumbnail name
            $img_ext = explode('.', $thumbnail_name);
            $img_ext = end($img_ext);
            $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
            if (!in_array($img_ext, $allowed_ext)) {
                return response()->json(['status_code' => 0, 'message' => "File extension is not allowed."]);
            }
            if ($this->is_image($thumb_base64) == false) {
                return response()->json(['status_code' => 0, 'message' => "File is not an image."]);
            }
            //upload file

            $thumb_name = $session_slug . '-' . time() . '.' . $img_ext;
            $thumb_path = public_path() . '/uploads/session_thumbnail/' . $thumb_name;
            $thumb_path_db = '/uploads/session_thumbnail/' . $thumb_name;
            file_put_contents($thumb_path, file_get_contents($thumb_base64));
            $thumbnail['result'] = $thumb_path_db;


            $session = new Session();
            $session->name = $session_name;
            $session->slug = $session_slug;
            $session->description = $description;
            $session->category_id = $category_id;
            $session->start_at = $start_time;
            $session->end_at = $end_time;
            $session->payment_and_shipping = $payment_and_shipping;
            $session->goal = $goal;
            $session->thumbnail = $thumb_path_db;
            $session->save();
            return response()->json([
                'message' => 'Create session successfully',
                'status_code' => 1,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    function base64_to_jpeg($base64_string, $output_file)
    {
        // open the output file for writing
        $ifp = fopen($output_file, 'wb');

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode(',', $base64_string);

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($data[1]));

        // clean up the file resource
        fclose($ifp);

        return $output_file;
    }
    public function is_image($path)
    {
        $a = getimagesize($path);
        $image_type = $a[2];

        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            return true;
        }
        return false;
    }

    public function del(Request $request)
    {
        $id = $request->id ?? null;
        if ($id == null) {
            return response()->json(['status_code' => 0, 'message' => "Session not found."]);
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 5 || $user->role == 4) {
            $session = Session::find($id);
            if ($session == null) {
                return response()->json(['status_code' => 0, 'message' => "Session not found."]);
            }
            $session->delete();
            return response()->json(['status_code' => 1, 'message' => "Delete session successfully."]);
        } else {

            return response()->json(['status_code' => 0, 'message' => "You don't have permission to delete this session."]);
        }
    }
}
