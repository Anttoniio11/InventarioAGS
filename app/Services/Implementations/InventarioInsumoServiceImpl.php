<?php

namespace App\Services\Implementations;

use App\Services\InventarioInsumoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoInsumo;

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
                'ci.descripcion',
                
            )
            ->get();
        }else{
            $categoriaInsumos = [];
        }
        return $categoriaInsumos;
    }

    public function crearElementoInsumo(array $data)
    {
        // Verificar si el registro sanitario ya existe
        $elementoExistente = DB::table('elementos_insumos')
            ->where('registro_sanitario', $data['registro_sanitario'])
            ->exists();

        if ($elementoExistente) {
            return response()->json(['mensaje' => 'El registro sanitario ya existe. Por favor, elija otro.'], 422);
        }

        // Datos a insertar en la base de datos
        $datos = [
            'registro_sanitario' => $data['registro_sanitario'],
            'marca' => $data['marca'],
            'fecha_vencimiento' => $data['fecha_vencimiento'],
            'indicaciones' => $data['indicaciones'],
            'observacion' => $data['observacion'],
            'cantidad' => $data['cantidad'],
            'id_categoria' => $data['id_categoria'],
            'id_factura' => $data['id_factura'],
            'id_empleado' => $data['id_empleado'],
            'id_area' => $data['id_area'],
            'id_sede' => $data['id_sede'],
            'created_at' => now(),
        ];

        // Insertar el nuevo elemento y obtener el ID generado
        $resultado = DB::table('elementos_insumos')->insertGetId($datos);

        return $resultado;
    }

    public function generarHojaDeVidaInsumo($id)
    {
        $elemento = ElementoInsumo::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaInsumos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }

}
