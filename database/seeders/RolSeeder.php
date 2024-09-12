<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Rol::create([
            'rol' => 'SUPER ADMINISTRADOR',
        ]);

        Rol::create([
            'rol' => 'ADMINISTRADOR',
        ]);

     
     
       
    }
}
