<?php

namespace App\Services\Implementations;

use App\Services\InventarioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioServiceImpl implements InventarioService {

    public function obtenerInventarioTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            $inventarioTecnologicos = DB::table("elementos_tecnologicos as et")
            ->select(
                'et.id',
                'et.codigo',
                'et.marca',
                'et.referencia',
                'et.serial',
                'et.ubicacion',
                'et.disponibilidad',
                'et.codigo_QR',
                'et.procesador',
                'et.ram',
                'et.tipo_almacenamiento',
                'et.almacenamiento',
                'et.tarjeta_grafica',
                'et.garantia',
                'et.id_empleado',
                'et.id_factura',
                'et.id_categoria',
                'et.id_estado'
            )
            ->get();
        }else{
            $inventarioTecnologicos = [];
        }
        return $inventarioTecnologicos;
    }

    public function obtenerInventarioFisico(){

        if(Schema::hasTable('elementos_fisicos')){
            $inventarioFisicos = DB::table("elementos_fisicos as ef")
            ->select(
                'ef.id',
                'ef.codigo',
                'ef.marca',
                'ef.modelo',
                'ef.ubicacion_interna',
                'ef.disponibilidad',
                'ef.codigo_QR',
            )
            ->get();
        }else{
            $inventarioFisicos = [];
        }
        return $inventarioFisicos;
    }

    public function obtenerInventarioMedico(){

        if(Schema::hasTable('elementos_medicos')){
            $inventarioMedicos = DB::table("elementos_medicos as em")
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
            )
            ->get();
        }else{
            $inventarioMedicos = [];
        }
        return $inventarioMedicos;
    }

    public function obtenerInventarioInsumo(){

        if(Schema::hasTable('elementos_insumos')){
            $inventarioInsumos = DB::table("elementos_insumos as ei")
            ->select(
                'ei.id',
                'ei.registro_sanitario',
                'ei.marca',
                'ei.fecha_vencimiento',
                'ei.indicaciones',
                'ei.observacion',
                'ei.cantidad',
            )
            ->get();
        }else{
            $inventarioInsumos = [];
        }
        return $inventarioInsumos;
    }

}
