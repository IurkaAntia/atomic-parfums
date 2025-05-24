<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Perfumes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Candles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diffusers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gift Sets', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
