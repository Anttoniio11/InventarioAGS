<?php

namespace Database\Seeders;

use App\Models\CategoriaInsumo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CategoriaInsumo::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaInsumo::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaInsumo::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaInsumo::create([
            'codigo' => '',
            'categoria' => '',
        ]);
       
    }
}
