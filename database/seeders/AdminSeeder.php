<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'settings' => $settings
        ];
        Admin::create($admin);
    }
}