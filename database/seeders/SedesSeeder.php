<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Sede::create([
            'departamento' => 'CAUCA',
            'municipio' => 'BUENOS AIRES',
        ]);

        Sede::create([
            'departamento' => 'CAUCA',
            'municipio' => 'BALBOA',
        ]);

        Sede::create([
            'departamento' => 'CAUCA',
            'municipio' => 'MERCADERES',
        ]);

        Sede::create([
            'departamento' => 'CAUCA',
            'municipio' => 'PATIA',
        ]);

        Sede::create([
            'departamento' => 'CAUCA',
            'municipio' => 'POPAYAN',
        ]);

    }
}
