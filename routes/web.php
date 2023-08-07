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
use App\Http\Controllers\NewDashboardController;
use App\Http\Controllers\AppraiserDashboardController;
use App\Http\Controllers\Auth\PasswordController as AuthPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EKYCController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SessionManagerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingController;
use App\Models\KYC;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

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
        'role:admin|editor|appraiser|seller|user',
    ]
], function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'news', 'middleware' => 'role:admin|editor'], function () {
        Route::get('/create', [NewDashboardController::class, 'Create'])->name('post.create');
        Route::post('/create', [NewDashboardController::class, 'store'])->name('post.store');
        Route::get('/{search?}', [NewDashboardController::class, 'index'])->name('post.index');
    });
    Route::group(['prefix' => 'appraiser', 'middleware' => 'role:admin|appraiser'], function () {
        Route::get('/create', [AppraiserDashboardController::class, 'store'])->name('appraiser.create');
        Route::get('/{search?}', [AppraiserDashboardController::class, 'index'])->name('appraiser.index');
    });


    Route::group(['prefix' => 'session', 'middleware' => 'role:admin|seller'], function () {
        Route::get('/', [SessionManagerController::class, 'index'])->name('dashboard.session.index');
        Route::get('/create', [SessionManagerController::class, 'create'])->name('dashboard.session.create');
    });


    Route::group(['prefix' => 'session', 'middleware' => 'role:admin|seller'], function () {
        Route::get('/', [SessionManagerController::class, 'index'])->name('dashboard.session.index');
        Route::get('/create', [SessionManagerController::class, 'create'])->name('dashboard.session.create');
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
    Route::get('/password_update', [ProfileController::class, 'update_password'])->name('profile.update_password');
    Route::post('/password_update', [ProfileController::class, 'update_password'])->name('profile.update_password');
    Route::get('/ekyc', [EKYCController::class, 'index'])->name('KYC.index');
    Route::post('/ekyc', [EKYCController::class, 'submit'])->name('KYC.submit');

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
        ->where(['session_slug' => '[a-z0-9-]+', 'id' => '[0-9]+'])->name('product.view');
    Route::get('/{slug?}', [ProductController::class, 'index'])
        ->where(['slug' => '[a-z0-9-]+'])->name('product.index');
    Route::post('/{product_id}', [ProductController::class, 'test'])
        ->where(['product_id' => '[0-9]+', 'bid' => '[0-9]+'])->name('product.test');
});


Route::middleware(['auth', 'publish.posts'])->group(function () {
});

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/shipping', [ShippingController::class, 'index'])->name('shipping.index');
