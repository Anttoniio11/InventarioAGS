<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService;

    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService) {
        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
    }

    public function inventarioTecnologico(){

        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos', 'categoriasTecnologicos'));

    }

    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioFisicoService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioFisicoService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos',compact('elementosFisicos', 'categoriasFisicos'));

    }

    public function inventarioMedico(){

        $elementosMedicos = $this->inventarioMedicoService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioMedicoService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos',compact('elementosMedicos', 'categoriasMedicos'));

    }

    public function inventarioInsumo(){

        $elementosInsumos = $this->inventarioInsumoService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioInsumoService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos',compact('elementosInsumos', 'categoriasInsumos'));

    }

    public function guardarElementoTecnologico(Request $request)
    {
        try {
            // Validar los datos
            $elementos = $request->validate([
                'codigo' => 'required|string|unique:elementos_tecnologicos,codigo',
                'marca' => 'required|string',
                'referencia' => 'required|string',
                'serial' => 'nullable|string',
                'ubicacion' => 'required|string',
                'disponibilidad' => 'required|string|in:SI,NO',
                'codigo_QR' => 'required|string',
                'procesador' => 'nullable|string',
                'ram' => 'nullable|string',
                'tipo_almacenamiento' => 'nullable|string',
                'almacenamiento' => 'nullable|string',
                'tarjeta_grafica' => 'nullable|string',
                'garantia' => 'nullable|string',
                'id_empleado' => 'nullable|integer|exists:empleados,id',
                'id_area' => 'nullable|integer|exists:areas,id',
                'id_sede' => 'nullable|integer|exists:sedes,id',
                'id_factura' => 'required|integer|exists:facturas,id',
                'id_categoria' => 'required|integer|exists:categorias_tecnologicos,id',
                'id_estado' => 'required|integer|exists:estado_elementos,id',
            ]);

            // Llamar al servicio para crear el elemento
            $resultado = $this->inventarioTecnologicoService->crearElementoTecnologico($elementos);

            return response()->json(['mensaje' => 'Elemento creado exitosamente', 'id' => $resultado], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function guardarElementoFisico(Request $request)
    {
        try {
            // Validar los datos del formulario
            $elementos = $request->validate([
                'codigo' => 'required|string',
                'marca' => 'required|string',
                'modelo' => 'required|string',
                'ubicacion_interna' => 'required|string',
                'disponibilidad' => 'required|string|in:SI,NO',
                'codigo_QR' => 'required|string',
                'id_estado' => 'required|integer',
                'id_categoria' => 'required|integer',
                'id_factura' => 'required|integer',
                'id_empleado' => 'nullable|integer',
                'id_area' => 'nullable|integer',
                'id_sede' => 'nullable|integer',
            ]);

            // Llamar al servicio para crear el elemento
            $resultado = $this->inventarioFisicoService->crearElementoFisico($elementos);

            return response()->json($resultado);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Enviar errores de validación
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar errores generales
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function guardarElementoMedico(Request $request)
    {
        try {
            // Validar los datos del formulario
            $elementos = $request->validate([
                'codigo' => 'required|string',
                'marca' => 'required|string',
                'modelo' => 'required|string',
                'serie' => 'nullable|string',
                'registro_sanitario' => 'required|string',
                'ubicacion_interna' => 'required|string',
                'disponibilidad' => 'required|string|in:SI,NO',
                'codigo_QR' => 'required|string',
                'id_estado' => 'required|integer',
                'id_categoria' => 'required|integer',
                'id_factura' => 'required|integer',
                'id_empleado' => 'nullable|integer',
                'id_area' => 'nullable|integer',
                'id_sede' => 'nullable|integer',
            ]);

            // Llamar al servicio para crear el elemento
            $resultado = $this->inventarioMedicoService->crearElementoMedico($elementos);

            return response()->json($resultado);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Enviar errores de validación
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar errores generales
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function guardarElementoInsumo(Request $request)
    {
        try {
            // Validar los datos del formulario
            $elementos = $request->validate([
                'registro_sanitario' => 'required|string',
                'marca' => 'required|string',
                'fecha_vencimiento' => 'required|date',
                'indicaciones' => 'nullable|string',
                'observacion' => 'nullable|string',
                'cantidad' => 'required|integer',
                'id_categoria' => 'required|integer',
                'id_factura' => 'required|integer',
                'id_empleado' => 'nullable|integer',
                'id_area' => 'nullable|integer',
                'id_sede' => 'nullable|integer',
            ]);

            // Llamar al servicio para crear el elemento
            $resultado = $this->inventarioInsumoService->crearElementoInsumo($elementos);

            return response()->json($resultado);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Enviar errores de validación
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar errores generales
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    


        public function getFields($table)
        {
            try {
                // Verifica si la tabla existe
                if (!Schema::hasTable($table)) {
                    return response()->json(['error' => 'Table not found'], 404);
                }

                // Obtiene los nombres de las columnas de la tabla
                $columns = DB::getSchemaBuilder()->getColumnListing($table);

                // Filtra 'id' y timestamps
                $filteredColumns = array_filter($columns, function($column) {
                    return !in_array($column, ['id', 'created_at', 'updated_at']);
                });

                return response()->json(array_values($filteredColumns));
            } catch (\Exception $e) {
                return response()->json(['error' => 'An error occurred'], 500);
            }
        }
}
