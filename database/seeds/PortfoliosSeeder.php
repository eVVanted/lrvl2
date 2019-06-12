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
        DB::table('portfolios')->insert([
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
                'name' => 'iPhone',
                'filter' => 'web',
                'images' => 'portfolio_pic6.jpg',
            ],
            [
                'name' => 'Nexus Phone',
                'filter' => 'web',
                'images' => 'portfolio_pic7.jpg',
            ],
            [
                'name' => 'Android',
                'filter' => 'android',
                'images' => 'portfolio_pic8.jpg',
            ]

        ]);
    }
}
