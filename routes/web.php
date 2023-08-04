<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddressOptionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OderCartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AppraiserController;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group([
    'prefix' => 'dashboard',
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        // 'verified',
        'role:admin|editor|appraiser|user',
    ]
], function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'news'], function () {
    });
});

Route::group([
    'prefix' => 'profile',
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
    ]
], function () {

    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('address')->middleware('verified')->group(function () {
        Route::get('/', [AddressController::class, 'index'])->name('address.index');
        Route::get('/add', [AddressController::class, 'show'])->name('address.show');
        Route::post('/add', [AddressController::class, 'store'])->name('address.store');
        Route::delete('/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
    });
});








Route::group(['prefix' => 'news'], function () {
    Route::get('/{slug}/{news_slug}', [NewsController::class, 'Detailpost'])
        ->where(['slug' => '[a-zA-Z0-9-]+', 'news_slug' => '[a-zA-Z0-9-]+'])->name('news.Detail');
    Route::get('/{slug?}', [NewsController::class, 'index'])
        ->where(['slug' => '[a-zA-Z0-9\s-]+'])->name('news.index');
});
Route::get('/appraiser', [AppraiserController::class, 'index'])->name('appraiser');



Route::post('/contact', ContactController::class)->name('contact');

Route::group(['prefix' => 'session'], function () {
    Route::get('/{slug}/{session_slug}', [SessionController::class, 'show'])
        ->where(['slug' => '[a-z0-9-]+', 'session_slug' => '[a-z0-9-]+'])->name('session.show');
    Route::get('/{slug?}', [SessionController::class, 'index'])
        ->where(['slug' => '[a-z0-9-]+'])->name('session.index');
});
Route::group(['prefix' => 'products'], function () {
    // Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{session_slug}/{id}', [ProductController::class, 'view'])
        ->where(['session_slug' => '[a-z0-9-]+', 'id' => '[a-z0-9-]+'])->name('product.view');
    Route::get('/{slug?}', [ProductController::class, 'index'])
        ->where(['slug' => '[a-z0-9-]+'])->name('product.index');
});
