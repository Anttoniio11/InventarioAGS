<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Area::create([
            'area' => 'TICS',
        ]);

        Area::create([
            'area' => '',
        ]);

        Area::create([
            'area' => '',
        ]);
       
    }
}
