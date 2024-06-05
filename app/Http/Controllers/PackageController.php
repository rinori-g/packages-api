<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::withCount('registrations')->get()->map(function ($package) {
            $package->available = $package->registrations_count < $package->limit;
            return $package;
        });

        return response()->json($packages);
    }
}
