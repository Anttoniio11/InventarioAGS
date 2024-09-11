<?php

namespace Database\Seeders;

use App\Models\CategoriaMedico;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CategoriaMedico::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaMedico::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaMedico::create([
            'codigo' => '',
            'categoria' => '',
        ]);

        CategoriaMedico::create([
            'codigo' => '',
            'categoria' => '',
        ]);
       
    }
}
