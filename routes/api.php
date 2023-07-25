<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data/team', [TeamController::class, 'index']);


Route::get('/news', [NewsController::class, 'show']);
Route::get('news/{id}', [NewsController::class, 'newsDetail']);

Route::get('/data/Testimonial', [TestimonialController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
