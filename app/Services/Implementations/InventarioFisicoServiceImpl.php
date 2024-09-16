<?php

namespace App\Services\Implementations;

use App\Services\InventarioFisicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioFisicoServiceImpl implements InventarioFisicoService {

    public function obtenerInventarioFisico(){

        if(Schema::hasTable('elementos_fisicos')){
            $inventarioFisicos = DB::table("elementos_fisicos as ef")
            ->join('categorias_fisicos as cf', 'ef.id_categoria', '=', 'ef.id_categoria')
            ->select(
                'ef.id',
                'ef.codigo',
                'ef.marca',
                'ef.modelo',
                'ef.ubicacion_interna',
                'ef.disponibilidad',
                'ef.codigo_QR',
                'ef.id_categoria', 
                'cf.categoria'
            )
            ->get();
        }else{
            $inventarioFisicos = [];
        }
        return $inventarioFisicos;
    }

    public function obtenerCategoriasFisico(){

        if(Schema::hasTable('categorias_fisicos')){
            $categoriaFisicos = DB::table("categorias_fisicos as cf")
            ->select(
                'cf.id',
                'cf.categoria',
                
            )
            ->get();
        }else{
            $categoriaFisicos = [];
        }
        return $categoriaFisicos;
    }

}
