<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Package;
use App\Models\Registration;
use Illuminate\Support\Str;

class RegisterPackage extends Command
{
    protected $signature = 'register:package {package_id} {customer_id}';

    protected $description = 'Register a package for a user';

    public function handle()
    {
        $packageId = $this->argument('package_id');
        $customerId = $this->argument('customer_id');

        $package = Package::find($packageId);

        if (!$package) {
            $this->error('Package not found.');
            return;
        }

        $registrationCount = Registration::where('package_id', $packageId)->count();

        if ($registrationCount >= $package->limit) {
            $this->error('Package is not available.');
            return;
        }

        $registration = Registration::create([
            'uuid' => Str::uuid(),
            'customer_id' => $customerId,
            'package_id' => $packageId,
            'registered_at' => now(),
        ]);

        $this->info('Package registration successful.');
    }
}
