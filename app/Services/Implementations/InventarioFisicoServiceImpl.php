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
                'cf.descripcion',
                
            )
            ->get();
        }else{
            $categoriaFisicos = [];
        }
        return $categoriaFisicos;
    }

    public function crearElementoFisico(array $data)
    {
        // Verificar si el código ya existe
        $elementoExistente = DB::table('elementos_fisicos')
            ->where('codigo', $data['codigo'])
            ->exists();
    
        if ($elementoExistente) {
            return response()->json(['mensaje' => 'El código del elemento ya existe. Por favor, elija otro código.'], 422);
        }
    
        // Datos a insertar en la base de datos
        $datos = [
            'codigo' => $data['codigo'],
            'marca' => $data['marca'],
            'modelo' => $data['modelo'],
            'ubicacion_interna' => $data['ubicacion_interna'],
            'disponibilidad' => $data['disponibilidad'],
            'codigo_QR' => $data['codigo_QR'],
            'id_estado' => $data['id_estado'],
            'id_categoria' => $data['id_categoria'],
            'id_factura' => $data['id_factura'],
            'id_empleado' => $data['id_empleado'],
            'id_area' => $data['id_area'],
            'id_sede' => $data['id_sede'],
            'created_at' => now(),
        ];
    
        // Insertar el nuevo elemento y obtener el ID generado
        $resultado = DB::table('elementos_fisicos')->insertGetId($datos);
    
        return $resultado;
    }


}
