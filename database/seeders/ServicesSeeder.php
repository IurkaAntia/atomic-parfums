<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DB;


class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'description' => 'Try our perfumes: order a discovery set',
                'icon' => '1.svg',
                
            ],
            [
                'id' => 2,
                'description' => 'Two samples included with all 50ml and 100ml orders',
                'icon' => '2.svg',
                
            ],
            [
                'id' => 3,
                'description' => 'Free shipping over b100',
                'icon' => '3.svg',
                
            ],
            [
                'id' => 4,
                'description' => 'Free returns on sealed products',
                'icon' => '4.svg',
                
            ],
            [
                'id' => 5,
                'description' => 'Signature gift wrapping on 50ml and 100ml perfumes',
                'icon' => '5.svg',
                
            ],
        ]);
    }
}
