<?php

namespace App\Services\Implementations;

use App\Services\InventarioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioServiceImpl implements InventarioService {

    public function obtenerInventarioTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            $inventarioTecnologicos = DB::table("elementos_tecnologicos as et")
            ->join('empleados as e', 'et.id_empleado', '=', 'e.id')
            ->leftJoin('facturas as f', 'et.id_factura', '=', 'f.id')
            ->leftJoin('categorias_tecnologicos as ct', 'et.id_categoria', '=', 'ct.id')
            ->leftJoin('estado_elementos as ee', 'et.id_estado', '=', 'ee.id')
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

}
