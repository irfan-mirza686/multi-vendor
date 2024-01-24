<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WholeSaler;

class WholeSalerSeeder extends Seeder
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
            [
                'id' => 1,
                'name' => 'WholeSaler',
            'username' => 'wholesaler',
            'business_name' => 'WholeSaler',
            'slug' => 'whole-saler',
            'email' => 'wholesaler@gmail.com',
            'password' => bcrypt('123456'),
            'cnic' => '33106-4587962-5',
            'mobile' => '03366667686',
            'settings' => json_encode($settings)
            ],
            [
                'id' => 2,
                'name' => 'WholeSaler 2',
            'username' => 'wholesaler2',
            'business_name' => 'WholeSaler2',
            'slug' => 'whole-saler-2',
            'email' => 'wholesaler2@gmail.com',
            'password' => bcrypt('123456'),
            'cnic' => '33106-4587962-1',
            'mobile' => '03366667486',
            'settings' => json_encode($settings)
            ]
            
        ];
        WholeSaler::insert($admin);
    }
}
