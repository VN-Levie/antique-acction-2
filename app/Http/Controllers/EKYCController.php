<?php

namespace App\Http\Controllers;

use App\Models\KYC;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EKYCController extends Controller
{
    public function index()
    {
        $models = ['kyc'];
        $user_data = null;
        $userkyc = null;

        if (Auth::check()) {
            $user_data = User::with($models)->find(Auth::id());
            $userkyc = $user_data->kyc ?? null;
        }

        $data = [
            'user' => $user_data,
            'userkyc' => $userkyc,
        ];

        return Inertia::render('Home/Profile/eKYC', $data);
    }

    public function submit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fullName' => 'required|string',
            'address' => 'required|string',
            'idCard' => 'required|file|mimes:jpeg,png,pdf', // Adjust allowed file types as needed
            'proofOfAddress' => 'required|file|mimes:jpeg,png,pdf', // Adjust allowed file types as needed
        ]);
        try {
            // Store eKYC information
            $ekyc = new KYC();
            $ekyc->full_name = $request->input('fullName');
            $ekyc->address = $request->input('address');

            // Handle file uploads for ID Card and Proof of Address
            $idCardPath = $request->file('idCard')->store('id_cards');
            $proofOfAddressPath = $request->file('proofOfAddress')->store('proof_of_address');

            $ekyc->id_card_path = $idCardPath;
            $ekyc->proof_of_address_path = $proofOfAddressPath;

            $ekyc->save();

            return redirect()->route('profile.index')->with('success', 'eKYC successfully.');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
