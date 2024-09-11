<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Rol::create([
            'rol' => 'BUENO',
        ]);

        Rol::create([
            'rol' => 'REGULAR',
        ]);

        Rol::create([
            'rol' => 'MALO',
        ]);

        Rol::create([
            'rol' => 'GARANTIA',
        ]);

        Rol::create([
            'rol' => 'OBSOLETO',
        ]);

        Rol::create([
            'rol' => 'PERDIDO',
        ]);
       
    }
}
