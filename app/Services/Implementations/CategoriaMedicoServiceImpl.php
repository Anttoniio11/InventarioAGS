<?php

namespace App\Services\Implementations;

use App\Services\CategoriaMedicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoriaMedicoServiceImpl implements CategoriaMedicoService {

    public function obtenerCategoriasMedico()
    {
        if(Schema::hasTable('categorias_medicos')){
            $categoriaMedicos = DB::table("categorias_medicos as cm")
            ->select(
                'cm.id',
                'cm.codigo',
                'cm.categoria',
                'cm.descripcion',
                
            )
            ->get();
        }else{
            $categoriaMedicos = [];
        }
        return $categoriaMedicos;
    }
    

}
