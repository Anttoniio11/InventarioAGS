<?php

namespace App\Services\Implementations;

use App\Services\InventarioMedicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioMedicoServiceImpl implements InventarioMedicoService {

    public function obtenerInventarioMedico(){

        if(Schema::hasTable('elementos_medicos')){
            $inventarioMedicos = DB::table("elementos_medicos as em")
            ->join('categorias_medicos as cm', 'em.id_categoria', '=', 'em.id_categoria')
            ->select(
                'em.id',
                'em.codigo',
                'em.marca',
                'em.modelo',
                'em.serie',
                'em.registro_sanitario',
                'em.ubicacion_interna',
                'em.disponibilidad',
                'em.codigo_QR',
                'em.id_categoria', 
                'cm.categoria'
            )
            ->get();
        }else{
            $inventarioMedicos = [];
        }
        return $inventarioMedicos;
    }

    public function obtenerCategoriasMedico(){

        if(Schema::hasTable('categorias_medicos')){
            $categoriaMedicos = DB::table("categorias_medicos as cm")
            ->select(
                'cm.id',
                'cm.codigo',
                'cm.categoria',
                
            )
            ->get();
        }else{
            $categoriaMedicos = [];
        }
        return $categoriaMedicos;
    }

 
}
