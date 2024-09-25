<?php

namespace App\Services\Implementations;

use App\Services\InventarioMedicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoMedico;
use Illuminate\Validation\ValidationException;


class InventarioMedicoServiceImpl implements InventarioMedicoService {

    public function obtenerInventarioMedico()
    {
        if(Schema::hasTable('elementos_medicos')) {
            $inventarioMedicos = DB::table('elementos_medicos as em')
                ->join('categorias_medicos as cm', 'em.id_categoria', '=', 'cm.id')
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
        } else {
            $inventarioMedicos = [];
        }
        return $inventarioMedicos;
    }

    public function generarHojaDeVidaMedico($id)
    {
        $elemento = ElementoMedico::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaMedicos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }

    public function crearElementoMedico(array $data)
    {
        $this->validarElemento($data);
        
        $elementoExistente = DB::table('elementos_medicos')
            ->where('codigo', $data['codigo'])
            ->exists();

        if ($elementoExistente) {
            throw new ValidationException('El código del elemento ya existe. Por favor, elija otro código.');
        }

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
            // 'id_empleado' => $data['id_empleado'],
            // 'id_area' => $data['id_area'],
            // 'id_sede' => $data['id_sede'],
            'created_at' => now(),
        ];

        // Insertar el nuevo elemento y obtener el ID generado
        $resultado = DB::table('elementos_medicos')->insertGetId($datos);
    }

    private function validarElemento(array $data)
    {
        $validator = validator()->make($data, [
            'codigo' => 'required|string|unique:elementos_medicos',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serie' => 'nullable|string',
            'registro_sanitario' => 'required|string',
            'ubicacion_interna' => 'required|string', 
            'disponibilidad' => 'required|in:SI,NO',
            'codigo_QR' => 'required|string',
            'id_estado' => 'required|integer|exists:estado_elementos,id',
            'id_categoria' => 'required|integer|exists:categorias_medicos,id',
            'id_factura' => 'required|integer|exists:facturas,id',
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
            'categorias_medicos',
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
            'categorias' => DB::table('categorias_medicos')->get(),
            'estados' => DB::table('estado_elementos')->get(),
        ];
    }

    public function obtenerElementoMedico($id)
    {
        return DB::table('elementos_medicos as em')
        ->join('categorias_medicos as cm', 'em.id_categoria', '=', 'cm.id')
        ->join('estado_elementos as ee', 'em.id_estado', '=', 'ee.id')
        ->select(
            'em.*',
            'cm.categoria', 
            'ee.estado' 
        )
        ->where('em.id', $id)
        ->first();
    }

    public function actualizarElementoMedico($id, $data)
    {
      
        $updateData = [
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
            // 'id_empleado' => $data['id_empleado'],
            // 'id_area' => $data['id_area'],
            // 'id_sede' => $data['id_sede'],
        ];
    
        return DB::table('elementos_medicos')
            ->where('id', $id)
            ->update($updateData);
    }


 
}
