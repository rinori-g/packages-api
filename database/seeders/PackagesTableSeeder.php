<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Package; 

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            Package::create([
                'uuid' => Str::uuid(),
                'name' => 'package' . ($i + 1),
                'limit' => rand(3, 8),
            ]);
        }
    }
}
