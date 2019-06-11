<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'name' => 'home',
                'position' => 'home',
                'text' => '',
                'images' => 'main_device_image.png',
            ],
            [
                'name' => 'about us',
                'position' => 'aboutUs',
                'text' => '',
                'images' => 'about-img.jpg',
            ]

        ]);
    }
}
