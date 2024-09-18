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
                'cm.descripcion',
                
            )
            ->get();
        }else{
            $categoriaMedicos = [];
        }
        return $categoriaMedicos;
    }

    public function crearElementoMedico(array $data)
    {
        // Verificar si el código ya existe
        $elementoExistente = DB::table('elementos_medicos')
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
            'serie' => $data['serie'],
            'registro_sanitario' => $data['registro_sanitario'],
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
        $resultado = DB::table('elementos_medicos')->insertGetId($datos);

        return $resultado;
    }


 
}
