<?php

namespace Database\Seeders;

use App\Models\CategoriaTecnologico;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CategoriaTecnologico::create([
            'categoria' => 'CARGADOR PORTATIL',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'PC PORTATIL',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'SERVIDOR DE RACK',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'EQUIPO TODO EN UNO',
        ]); 
        
        CategoriaTecnologico::create([
            'categoria' => 'MONITOR',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'TORRE',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'IMPRESORA',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'FOTOCOPIADORA',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'ESCANER',
        ]); 

        CategoriaTecnologico::create([
            'categoria' => 'SWITCH',
        ]); 
       
    }
}
