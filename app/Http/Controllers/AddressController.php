<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use IntlChar;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Nạp trước model User liên quan đến model Address
        // $models = ['user'];
        // // dd(auth()->user()->id);
        // $user_address = Address::with($models)->where('user_id', auth()->user()->id)->get();
        // $data = [
        //     'user_address' => $user_address,
        // ];

        // return Inertia::render('Home/Address/Index', $data);
        $models = ['addresses'];
        if (Auth::guest()) {
            $user_data = null;
        } else {
            $userAddresses = Auth::user()->addresses;
            $user_data = User::with($models)->find(Auth::id());
        }

        $data = [
            'user' => $user_data,
            'userAddresses' => $userAddresses ?? null,
        ];

        return Inertia::render('Home/Address/Index', $data);
    }

    public function show()
    {

        return Inertia::render('Home/Address/Add');
    }

    public function store(Request $request)
    {
        try {
            $address = new Address;

            $address->user_id = auth()->user()->id;
            $address->address1 = $request->get('address1');
            $address->address2 = $request->get('address2');
            $address->city = $request->get('city');
            $address->postcode = $request->get('postcode');
            $address->country = $request->get('country');

            $address->save();

            return redirect()->route('address.index');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $address = Address::findOrFail($id);

            $address->address1 = $request->get('address1');
            $address->address2 = $request->get('address2');
            $address->city = $request->get('city');
            $address->postcode = $request->get('postcode');
            $address->country = $request->get('country');

            $address->save();

            return redirect()->route('address.index');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $address = Address::find($id);
            $address->delete();

            return redirect()->route('address.index');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
