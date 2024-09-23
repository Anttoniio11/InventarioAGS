<?php

namespace App\Services\Implementations;

use App\Services\CategoriaTecnologicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoriaTecnologicoServiceImpl implements CategoriaTecnologicoService {

    public function obtenerCategoriasTecnologico()
    {

        if(Schema::hasTable('categorias_tecnologicos')){
            $categoriaTecnologicos = DB::table("categorias_tecnologicos as ct")
            ->select(
                'ct.id',
                'ct.categoria',
                'ct.descripcion',
                
            )
            ->get();
        }else{
            $categoriaTecnologicos = [];
        }
        return $categoriaTecnologicos;
    }

}
