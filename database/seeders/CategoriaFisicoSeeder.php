<?php

namespace Database\Seeders;

use App\Models\CategoriaFisico;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CategoriaFisico::create([
            'categoria' => '',
        ]); 

        CategoriaFisico::create([
            'categoria' => '',
        ]); 

        CategoriaFisico::create([
            'categoria' => '',
        ]); 
       
    }
}
