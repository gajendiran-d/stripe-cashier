<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'price' => 15.45,
                'description' => 'Sample description for Product 1',
            ],
            [
                'name' => 'Product 2',
                'price' => 29.99,
                'description' => 'Sample description for Product 2',
            ],
            [
                'name' => 'Product 3',
                'price' => 37.00,
                'description' => 'Sample description for Product 3',
            ],
            [
                'name' => 'Product 4',
                'price' => 48.25,
                'description' => 'Sample description for Product 4',
            ],
            [
                'name' => 'Product 5',
                'price' => 59.69,
                'description' => 'Sample description for Product 5',
            ],
            [
                'name' => 'Product 6',
                'price' => 77.88,
                'description' => 'Sample description for Product 6',
            ],
            // Add more products as needed
        ]);
    }
}
