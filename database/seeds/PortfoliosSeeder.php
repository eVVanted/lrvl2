<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfoliosSeeder extends Seeder
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
                'name' => 'Finance App',
                'filter' => 'GPS',
                'images' => 'portfolio_pic2.jpg',
            ],
            [
                'name' => 'Concept',
                'filter' => 'design',
                'images' => 'portfolio_pic3.jpg',
            ],
            [
                'name' => 'Shopping',
                'filter' => 'android',
                'images' => 'portfolio_pic4.jpg',
            ],
            [
                'name' => 'Managment',
                'filter' => 'design',
                'images' => 'portfolio_pic5.jpg',
            ],
            [
                'name' => 'about us',
                'filter' => 'aboutUs',
                'images' => 'about-img.jpg',
            ]

        ]);
    }
}
