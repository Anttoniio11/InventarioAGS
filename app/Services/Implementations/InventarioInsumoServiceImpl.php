<?php

namespace App\Services\Implementations;

use App\Services\InventarioInsumoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioInsumoServiceImpl implements InventarioInsumoService {

    public function obtenerInventarioInsumo(){

        if(Schema::hasTable('elementos_insumos')){
            $inventarioInsumos = DB::table("elementos_insumos as ei")
            ->join('categorias_insumos as ci', 'ei.id_categoria', '=', 'ei.id_categoria')
            ->select(
                'ei.id',
                'ei.registro_sanitario',
                'ei.marca',
                'ei.fecha_vencimiento',
                'ei.indicaciones',
                'ei.observacion',
                'ei.cantidad',
                'ei.id_categoria', 
                'ci.categoria'
            )
            ->get();
        }else{
            $inventarioInsumos = [];
        }
        return $inventarioInsumos;
    }

    public function obtenerCategoriasInsumo(){

        if(Schema::hasTable('categorias_insumos')){
            $categoriaInsumos = DB::table("categorias_insumos as ci")
            ->select(
                'ci.id',
                'ci.codigo',
                'ci.categoria',
                
            )
            ->get();
        }else{
            $categoriaInsumos = [];
        }
        return $categoriaInsumos;
    }

    public function crearElementoInsumo(array $data)
    {

        $datos = [
            'registro_sanitario' => $data['registro_sanitario'],
            'marca' => $data['marca'],
            'fecha_vencimiento' => $data['fecha_vencimiento'],
            'indicaciones' => $data['indicaciones'],
            'observacion' => $data['observacion'],
            'cantidad' => $data['cantidad'],
            'id_empleado' => $data['id_empleado'],
            'id_area' => $data['id_area'],
            'id_sede' => $data['id_sede'],
            'id_factura' => $data['id_factura'],
            'id_categoria' => $data['id_categoria'],
            'created_at' => now(),
        ];

        $resultado = DB::table('elementos_insumos')->insertGetId($datos);
        return $resultado;
    }

}
