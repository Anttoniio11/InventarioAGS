<?php

namespace Database\Seeders;

use App\Models\EstadoElemento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoElementoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoElemento::create([
            'estado' => 'BUENO'
        ]);

        EstadoElemento::create([
            'estado' => 'REGULAR'
        ]);

        EstadoElemento::create([
            'estado' => 'MALO'
        ]);

        EstadoElemento::create([
            'estado' => 'GARANTIA'
        ]);

        EstadoElemento::create([
            'estado' => 'OBSOLETO'
        ]);

        EstadoElemento::create([
            'estado' => 'PERDIDO'
        ]);

        EstadoElemento::create([
            'estado' => 'DADO DE BAJA'
        ]);


    }
}
