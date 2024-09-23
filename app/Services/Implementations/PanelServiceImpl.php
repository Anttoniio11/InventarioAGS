<?php

namespace App\Services\Implementations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\PanelService;
use App\Models\ElementoTecnologico; 
use App\Models\ElementoFisico;
use App\Models\ElementoMedico; 
use App\Models\ElementoInsumo; 

class PanelServiceImpl implements PanelService {

    public function obtenerCantidadElementosFisicos()
    {
        return DB::table('elementos_fisicos')->count();
    }

}


