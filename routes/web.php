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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin|editor|appraiser',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});
// Route::inertia('/abouts', 'About');
// Route::get('products', function () {
//     return Inertia::render('Products/Show', []);
// })->name('products');


// Route::group(['prefix' => 'products'], function () {
//     Route::get('/', [ProductController::class, 'index'])->name('product.index');
// });


Route::group(['prefix' => 'news'], function () {
    Route::get('/{slug}/{news_slug}', [NewsController::class, 'Detailpost'])
        ->where(['slug' => '[a-zA-Z0-9-]+', 'news_slug' => '[a-zA-Z0-9-]+'])->name('news.Detail');
    // Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{slug?}', [NewsController::class, 'index'])->where(['slug' => '[a-zA-Z0-9\s-]+'])->name('news.index');
    // Route::get('/newsDetail/{id}', [NewsController::class, 'Detailpost'])->where('id', '[0-9]+')->name('news.Detail');

});
Route::get('/appraiser', [AppraiserController::class, 'index'])->name('appraiser');



Route::post('/contact', ContactController::class)->name('contact');

Route::group(['prefix' => 'session'], function () {
    // index or id
    // Route::get('/', [SessionController::class, 'index'])->where('page', '[0-9]+')->name('session.index');

    Route::get('/{slug}/{session_slug}', [SessionController::class, 'show'])
        ->where(['slug' => '[a-z0-9-]+', 'session_slug' => '[a-z0-9-]+'])->name('session.show');
    Route::get('/{slug?}', [SessionController::class, 'index'])
        ->where(['slug' => '[a-z0-9-]+'])->name('session.index');
});
// Route::get('/address', [AddressController::class, 'index'])->name('address.index');
// Route::get('/address_add', [AddressController::class, 'show'])->name('address.show');
// Route::post('/address_add', [AddressController::class, 'store'])->name('address.store');
// Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.destroy');

Route::prefix('address')->group(function () {
    Route::get('/', [AddressController::class, 'index'])->name('address.index');
    Route::get('/add', [AddressController::class, 'show'])->name('address.show');
    Route::post('/add', [AddressController::class, 'store'])->name('address.store');
    Route::delete('/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
});

// Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
// Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::get('/oder', [OderCartController::class, 'index'])->name('oder.index');
// Route::get('/shipping', [ProfileController::class, 'edit'])->name('profile.edit');
