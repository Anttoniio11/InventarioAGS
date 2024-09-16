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


    public function crearElementoTecnologico(array $data)
    {
        $elementoExistente = DB::table('contratos_convenios_salud')
            ->where('numero_contrato', $data['numero_contrato'])
            ->exists();

        if ($elementoExistente) {
            return response()->json(['mensaje' => 'El número de contrato ya existe. Por favor, elija otro número.'], 422);
        }

        $datos = [
            'nit_contratante' => $data['nit_contratante'],
            'nit_contratista' => $data['nit_contratista'],
            'razon_social_contratante' => $data['razon_social_contratante'],
            'razon_social_contratista' => $data['razon_social_contratista'],
            'codigo_habilitacion_sedes_contratista' => $data['codigo_habilitacion_sede'],
            'modalidad_pago' => $data['modalidad_pago'],
            'numero_contrato' => $data['numero_contrato'],
            'tipo_contrato' => $data['tipo_contrato'],
            'tipo_contratacion' => $data['tipo_contratacion'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'prorrogas' => $data['prorroga'],
            'estado_contrato' => $data['estado_contrato'],
            'entidad_salud' => $data['entidadSalud'],
            'created_at' => now(),
        ];

        $resultado = DB::table('contratos_convenios_salud')->insertGetId($datos);

        return $resultado;
    }


    

}
