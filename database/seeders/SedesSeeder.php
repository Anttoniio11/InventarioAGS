<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Sede::create([
            'nit' => '',
            'razon_social' => '',
            'departamento' => '',
            'municipio' => '',
        ]);

        Sede::create([
            'nit' => '',
            'razon_social' => '',
            'departamento' => '',
            'municipio' => '',
        ]);

        Sede::create([
            'nit' => '',
            'razon_social' => '',
            'departamento' => '',
            'municipio' => '',
        ]);

    }
}
