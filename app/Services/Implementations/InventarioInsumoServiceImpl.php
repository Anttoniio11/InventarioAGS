<?php

namespace App\Services\Implementations;

use App\Services\InventarioInsumoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoInsumo;
use Illuminate\Validation\ValidationException;

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

    

    public function generarHojaDeVidaInsumo($id)
    {
        $elemento = ElementoInsumo::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaInsumos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }

    public function crearElementoInsumo(array $data)
    {
        $this->validarElemento($data);

        $elementoExistente = DB::table('elementos_insumos')
            ->where('registro_sanitario', $data['registro_sanitario'])
            ->exists();

        if ($elementoExistente) {
            throw new ValidationException('El código del elemento ya existe. Por favor, elija otro código.');
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
        return DB::table('elementos_insumos')->insertGetId($datos);
    }

    private function validarElemento(array $data)
    {
        $validator = validator()->make($data, [
            'registro_sanitario' => 'required|string',
            'marca' => 'required|string',
            'fecha_vencimiento' => 'required|string',
            'indicaciones' => 'nullable|string',
            'observacion' => 'nullable|string',
            'cantidad' => 'required|string',
            'id_empleado' => 'nullable|integer|exists:empleados,id',
            'id_area' => 'nullable|integer|exists:areas,id',
            'id_sede' => 'nullable|integer|exists:sedes,id',
            'id_factura' => 'required|integer|exists:facturas,id',
            'id_categoria' => 'required|integer|exists:categorias_insumos,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function obtenerDatosForaneos()
    {
        $tablas = [
            'empleados',
            'areas',
            'sedes',
            'facturas',
            'categorias_insumos',
        ];

        foreach ($tablas as $tabla) {
            if (!Schema::hasTable($tabla)) {
                throw new \Exception("La tabla '{$tabla}' no existe.");
            }
        }

        return [
            'empleados' => DB::table('empleados')->get(),
            'areas' => DB::table('areas')->get(),
            'sedes' => DB::table('sedes')->get(),
            'facturas' => DB::table('facturas')->get(),
            'categorias' => DB::table('categorias_insumos')->get(),
        ];
    }

    

}
