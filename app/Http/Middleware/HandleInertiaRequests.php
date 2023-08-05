<?php

namespace App\Http\Middleware;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app'; //thay đổi rootview

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $models = ['addresses','roles'];
        if (Auth::guest()) {
            $user = null;
        } else {
            $user = User::with($models)->find(Auth::id());
        }
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user,
            ],
            'errors' => function () {
                return session()->get('errors')
                    ? session()->get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
            'flash' => function () {
                return [
                    'message' => session()->get('message'),
                ];
            },
            'route' => function () {
                return [
                    'name' => Route::currentRouteName(),
                    'params' => Route::current()->parameters(),
                ];
            },
            'ziggy' => function () {
                return new Ziggy;
            },
        ]);
    }
}
