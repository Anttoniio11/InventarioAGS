<?php

namespace App\Services\Implementations;

use App\Services\InventarioTecnologicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioTecnologicoServiceImpl implements InventarioTecnologicoService {

    public function obtenerInventarioTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            $inventarioTecnologicos = DB::table("elementos_tecnologicos as et")
            ->join('categorias_tecnologicos as ct', 'et.id_categoria', '=', 'et.id_categoria')
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
                'et.id_estado',
                'et.id_categoria', 
                'ct.categoria'
            )
            ->get();
        }else{
            $inventarioTecnologicos = [];
        }
        return $inventarioTecnologicos;
    }

    public function crearElementoTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            
        }

    }

    public function obtenerCategoriasTecnologico(){

        if(Schema::hasTable('categorias_tecnologicos')){
            $categoriaTecnologicos = DB::table("categorias_tecnologicos as ct")
            ->select(
                'ct.id',
                'ct.categoria',
                
            )
            ->get();
        }else{
            $categoriaTecnologicos = [];
        }
        return $categoriaTecnologicos;
    }


    

}
