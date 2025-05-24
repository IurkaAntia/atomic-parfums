<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Product 1',
                'description' => 'Description for Product 1',
                'image' => 'product1.jpg',
                'quantity' => 100,
                'price' => 50.00,
                'sale_price' => 45.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'image' => 'product2.jpg',
                'quantity' => 200,
                'price' => 30.00,
                'sale_price' => 25.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Product 3',
                'description' => 'Description for Product 3',
                'image' => 'product3.jpg',
                'quantity' => 150,
                'price' => 70.00,
                'sale_price' => 65.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
