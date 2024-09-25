<?php

namespace App\Services\Implementations;

use App\Services\InventarioFisicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoFisico;
use Illuminate\Validation\ValidationException;

class InventarioFisicoServiceImpl implements InventarioFisicoService {

    public function obtenerInventarioFisico(){
        if (Schema::hasTable('elementos_fisicos')) {
            $inventarioFisicos = DB::table('elementos_fisicos as ef')
                ->join('categorias_fisicos as cf', 'ef.id_categoria', '=', 'cf.id') // Corregido el JOIN
                ->select(
                    'ef.id',
                    'ef.codigo',
                    'ef.marca',
                    'ef.modelo',
                    'ef.ubicacion_interna',
                    'ef.disponibilidad',
                    'ef.codigo_QR',
                    'ef.id_categoria',
                    'cf.categoria' // Este campo trae el nombre de la categoría asociada
                )
                ->get();
        } else {
            $inventarioFisicos = [];
        }
        return $inventarioFisicos;
    }

    public function generarHojaDeVidaFisico($id)
    {
        $elemento = ElementoFisico::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaFisicos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }

    public function crearElementoFisico(array $data)
    {
        $this->validarElemento($data);

        $elementoExistente = DB::table('elementos_fisicos')
            ->where('codigo', $data['codigo'])
            ->exists();
    
        if ($elementoExistente) {
            throw new ValidationException('El código del elemento ya existe. Por favor, elija otro código.');
        }
    
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
            // 'id_empleado' => $data['id_empleado'],
            // 'id_area' => $data['id_area'],
            // 'id_sede' => $data['id_sede'],
            'created_at' => now(),
        ];
    
        // Insertar el nuevo elemento y obtener el ID generado
        return DB::table('elementos_fisicos')->insertGetId($datos);
    }

    private function validarElemento(array $data)
    {
        $validator = validator()->make($data, [
            'codigo' => 'required|string|unique:elementos_fisicos',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'ubicacion_interna' => 'required|string',
            'disponibilidad' => 'required|in:SI,NO',
            'codigo_QR' => 'required|string',
            'id_estado' => 'nullable|integer|exists:estado_elementos,id',
            'id_categoria' => 'nullable|integer|exists:categorias_fisicos,id',
            'id_factura' => 'nullable|integer|exists:facturas,id',
            'id_empleado' => 'nullable|integer|exists:empleados,id',
            'id_area' => 'nullable|integer|exists:areas,id',
            'id_sede' => 'nullable|integer|exists:sedes,id',
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
            'categorias_fisicos',
            'estado_elementos',
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
            'categorias' => DB::table('categorias_fisicos')->get(),
            'estados' => DB::table('estado_elementos')->get(),
        ];
    }

    public function obtenerElementoFisico($id)
    {
        return DB::table('elementos_fisicos as ef')
        ->join('categorias_fisicos as cf', 'ef.id_categoria', '=', 'cf.id')
        ->join('estado_elementos as ee', 'ef.id_estado', '=', 'ee.id')
        ->select(
            'ef.*',
            'cf.categoria', 
            'ee.estado' 
        )
        ->where('ef.id', $id)
        ->first();
    }

    public function actualizarElementoFisico($id, $data)
    {
      
        $updateData = [
            'codigo' => $data['codigo'],
            'marca' => $data['marca'],
            'modelo' => $data['modelo'],
            'ubicacion_interna' => $data['ubicacion_interna'],
            'disponibilidad' => $data['disponibilidad'],
            'codigo_QR' => $data['codigo_QR'],
            'id_estado' => $data['id_estado'],
            'id_categoria' => $data['id_categoria'],
            'id_factura' => $data['id_factura'],
            // 'id_empleado' => $data['id_empleado'],
            // 'id_area' => $data['id_area'],
            // 'id_sede' => $data['id_sede'],
        ];
    
        return DB::table('elementos_fisicos')
            ->where('id', $id)
            ->update($updateData);
    }


}
