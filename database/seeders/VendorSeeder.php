<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'themeMode' => 'lightmode',
            'headerColor' => '',
            'sidebarColor' => '',
        ];

        $admin = [
            'name' => 'Vendor',
            'username' => 'vendor',
            'business_name' => 'Vendor',
            'slug' => 'vendor',
            'email' => 'vendor@gmail.com',
            'password' => bcrypt('123456'),
            'cnic' => '33106-4587962-5',
            'mobile' => '03016869584',
            'settings' => $settings
        ];
        Vendor::create($admin);
    }
}
