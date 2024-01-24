<?php

namespace Database\Seeders;
use App\Models\PackageType;

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pkg = [
            [
                'id' => 1,
                'name' => 'standard'
            ],
            [
                'id' => 2,
                'name' => 'custom'
            ],
            
        ];
        PackageType::insert($pkg);
    }
}
