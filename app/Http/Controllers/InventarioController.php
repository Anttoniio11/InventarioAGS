<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\ElementoTecnologico;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;
use Illuminate\Support\Facades\Log;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService;

    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService)
    {
        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
    }

    public function inventarioTecnologico()
    {
        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        $datos = $this->inventarioTecnologicoService->obtenerDatosForaneos();

        return view('inventario.tecnologicos.elementos', [
            'elementosTecnologicos' => $elementosTecnologicos,
            'categoriasTecnologicos' => $categoriasTecnologicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados'],
        ]);
    }



    public function inventarioFisico()
    {

        $elementosFisicos = $this->inventarioFisicoService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioFisicoService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos', compact('elementosFisicos', 'categoriasFisicos'));
    }

    public function inventarioMedico()
    {

        $elementosMedicos = $this->inventarioMedicoService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioMedicoService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos', compact('elementosMedicos', 'categoriasMedicos'));
    }

    public function inventarioInsumo()
    {

        $elementosInsumos = $this->inventarioInsumoService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioInsumoService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos', compact('elementosInsumos', 'categoriasInsumos'));
    }


    public function guardarElementoTecnologico(Request $request)
    {
        try {

            $this->inventarioTecnologicoService->crearElementoTecnologico($request->all());

            return redirect()->route('inventarioTecnologico.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function actualizarElementoTecnologico(Request $request, $id)
    {

        if (!$id) {
            return response()->json(['mensaje' => 'El ID es nulo o inválido'], 400);
        }

        try {
            dd($id);
            // Llama al servicio para editar el elemento
            $this->inventarioTecnologicoService->editarElementoTecnologico($request->all(), $id);
    
            return redirect()->route('inventarioTecnologico.index')->with('success', 'Elemento actualizado correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }
    
    public function obtenerElementoTecnologico($id)
    {

        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        $datos = $this->inventarioTecnologicoService->obtenerDatosForaneos();

        $elemento = $this->inventarioTecnologicoService->obtenerElementoTecnologicoPorId($id);
    
        
        if (!$elemento) {
            return redirect()->route('inventarioTecnologico.index')->with('error', 'Elemento no encontrado.');
        }
    
   
        return view('inventario.tecnologicos.elementos', [
            'elemento' => $elemento,
            'elementosTecnologicos' => $elementosTecnologicos,
            'categoriasTecnologicos' => $categoriasTecnologicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados']
        
        ]);
    }
    

}
