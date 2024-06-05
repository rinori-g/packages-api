<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageRegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $package = Package::withCount('registrations')->find($request->package_id);

        if ($package->registrations_count >= $package->limit) {
            return response()->json([
                'error' => 'Package is not available.'
            ], 400);
        }

        $registration = Registration::create([
            'uuid' => Str::uuid(),
            'customer_id' => $request->customer_id,
            'package_id' => $request->package_id,
            'registered_at' => now(),
        ]);

        return response()->json([
            'message' => 'Package registration successful.',
            'registration' => $registration
        ], 201);
    }
}
