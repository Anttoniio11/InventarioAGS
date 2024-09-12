<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
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
            'area' => 'CONTABILIDAD',
        ]);

        Area::create([
            'area' => 'CALIDAD',
        ]);

        Area::create([
            'area' => 'ASISTENCIAL',
        ]);

       
    }
}
