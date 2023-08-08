<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Session;

class ProductManagerController extends Controller
{
    public function create(Request $request)
    {

        $session_id = $request->session_id ?? null;
        if ($session_id == null) {
            return redirect()->route('dashboard.product.index');
        }
        $session = Session::find($session_id);
        if ($session == null) {
            return redirect()->route('dashboard.product.index');
            redirect()->route('dashboard.product.index');
        }
        // dd($Product);
        $models = [];
        $product_categories = Category::with($models)->get();
        $data = [
            'product_categories' => $product_categories,
            'session' => $session,
        ];


        return Inertia::render('Dashboard/Product/CreateProduct', $data);
    }
    public function store(Request $request)
    {
        $Product_name = $request->Product_name;
        $Product_slug = $request->Product_slug;
        $description = $request->description;
        $category_id = $request->category_id;
        $start_time = $request->date_start;
        $end_time = $request->date_end;
        $payment_and_shipping = $request->payment_and_shipping;
        $goal = $request->goal;
        $images = $request->images;
        // $thumb_base64 = $images['result'];
        // $images_name = $request->images_name;
        // dd($images);
        if ($Product_name == null || $Product_slug == null || $description == null || $category_id == null || $start_time == null || $end_time == null || $payment_and_shipping == null || $goal == null || $images == null) {
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
            // //check slug
            // $check_slug = Product::where('slug', $Product_slug)->first();
            // if ($check_slug != null) {
            //     return response()->json(['status_code' => 0, 'message' => "Slug has been used."]);
            // }
            // //check images name
            // $img_ext = explode('.', $images);
            // $img_ext = end($img_ext);
            // $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
            // if (!in_array($img_ext, $allowed_ext)) {
            //     return response()->json(['status_code' => 0, 'message' => "File extension is not allowed."]);
            // }
            // if ($this->is_image($images) == false) {
            //     return response()->json(['status_code' => 0, 'message' => "File is not an image."]);
            // }
            //upload file

            // $thumb_name = $Product_slug . '-' . time() . '.' . $img_ext;
            // $thumb_path = public_path() . '/uploads/Product_images/' . $thumb_name;
            // $thumb_path_db = '/uploads/Product_images/' . $thumb_name;
            // file_put_contents($thumb_path, file_get_contents($images));
            // $images['result'] = $thumb_path_db;

            $thumb_path_db = "";

            $Product = new Product();
            $Product->name = $Product_name;
            $Product->slug = $Product_slug;
            $Product->description = $description;
            $Product->category_id = $category_id;
            $Product->start_at = $start_time;
            $Product->end_at = $end_time;
            $Product->payment_and_shipping = $payment_and_shipping;
            $Product->goal = $goal;
            $Product->images = $thumb_path_db;
            $Product->save();
            return response()->json([
                'message' => 'Create Product successfully',
                'status_code' => 1,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function del(Request $request)
    {
        $id = $request->id ?? null;
        if ($id == null) {
            return response()->json(['status_code' => 0, 'message' => "Product not found."]);
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 5 || $user->role == 4) {
            $Product = Product::find($id);
            if ($Product == null) {
                return response()->json(['status_code' => 0, 'message' => "Product not found."]);
            }
            $Product->delete();
            return response()->json(['status_code' => 1, 'message' => "Delete Product successfully."]);
        } else {

            return response()->json(['status_code' => 0, 'message' => "You don't have permission to delete this Product."]);
        }
    }
}
