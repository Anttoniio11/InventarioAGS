<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;
use App\Services\CategoriaTecnologicoService;
use App\Services\CategoriaFisicoService;
use App\Services\CategoriaMedicoService;
use App\Services\CategoriaInsumoService;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService, $categoriaTecnologicoService, $categoriaFisicoService, $categoriaMedicoService, $categoriaInsumoService ;



    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService, CategoriaTecnologicoService $categoriaTecnologicoService, CategoriaFisicoService $categoriaFisicoService, CategoriaMedicoService $categoriaMedicoService, CategoriaInsumoService $categoriaInsumoService) {

        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
        $this->categoriaTecnologicoService = $categoriaTecnologicoService;
        $this->categoriaFisicoService = $categoriaFisicoService;
        $this->categoriaMedicoService = $categoriaMedicoService;
        $this->categoriaInsumoService = $categoriaInsumoService;
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



    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioFisicoService->obtenerInventarioFisico();
        $categoriasFisicos = $this->categoriaFisicoService->obtenerCategoriasFisico();

        $datos = $this->inventarioFisicoService->obtenerDatosForaneos();

        return view('inventario.fisicos.elementos', [
            'elementosFisicos' => $elementosFisicos,
            'categoriasFisicos' => $categoriasFisicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados'],
        ]);
    }

   
    public function inventarioMedico(){ 


        $elementosMedicos = $this->inventarioMedicoService->obtenerInventarioMedico();
        $categoriasMedicos = $this->categoriaMedicoService->obtenerCategoriasMedico();

        $datos = $this->inventarioMedicoService->obtenerDatosForaneos();

        return view('inventario.medicos.elementos', [
            'elementosMedicos' => $elementosMedicos,
            'categoriasMedicos' => $categoriasMedicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados'],
        ]);

    }

    public function inventarioInsumo()
    {

        $elementosInsumos = $this->inventarioInsumoService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->categoriaInsumoService->obtenerCategoriasInsumo();

        $datos = $this->inventarioInsumoService->obtenerDatosForaneos();

        return view('inventario.insumos.elementos', [
            'elementosInsumos' => $elementosInsumos,
            'categoriasInsumos' => $categoriasInsumos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
        ]);

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

    // public function actualizarElementoTecnologico(Request $request, $id)
    // {

    //     if (!$id) {
    //         return response()->json(['mensaje' => 'El ID es nulo o inválido'], 400);
    //     }

        
    //     try {

    //         $resultado = $this->inventarioTecnologicoService->crearElementoTecnologico($request->all());


    //         return redirect()->route('inventarioTecnologico.index');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json(['mensaje' => $e->errors()], 422);
    //     } catch (\Exception $e) {
    //         return response()->json(['mensaje' => 'Error interno del servidor'], 500);
    //     }
    // }
    

    public function guardarElementoFisico(Request $request)
    {
        try {

            $resultado = $this->inventarioFisicoService->crearElementoFisico($request->all());

            return redirect()->route('inventarioFisico.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }
 
    public function guardarElementoMedico(Request $request)
    {
        try {

            $resultado = $this->inventarioMedicoService->crearElementoMedico($request->all());

            return redirect()->route('inventarioMedico.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function guardarElementoInsumo(Request $request)
    {
        try {

            $resultado = $this->inventarioInsumoService->crearElementoInsumo($request->all());

            return redirect()->route('inventarioInsumo.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function verElementoTecnologico($id)
    {
        return $this->inventarioTecnologicoService->generarHojaDeVidaTecnologico($id);

    }
    
    // public function obtenerElementoTecnologico($id)
    // {

    //     $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
    //     $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

    //     $datos = $this->inventarioTecnologicoService->obtenerDatosForaneos();

    //     $elemento = $this->inventarioTecnologicoService->obtenerElementoTecnologicoPorId($id);
    
        
    //     if (!$elemento) {
    //         return redirect()->route('inventarioTecnologico.index')->with('error', 'Elemento no encontrado.');
    //     }
    
   
    //     return view('inventario.tecnologicos.elementos', [
    //         'elemento' => $elemento,
    //         'elementosTecnologicos' => $elementosTecnologicos,
    //         'categoriasTecnologicos' => $categoriasTecnologicos,
    //         'empleados' => $datos['empleados'],
    //         'areas' => $datos['areas'],
    //         'sedes' => $datos['sedes'],
    //         'facturas' => $datos['facturas'],
    //         'categorias' => $datos['categorias'],
    //         'estados' => $datos['estados']
        
    //     ]);
    // }
    
    public function verElementoFisico($id)
    {
        return $this->inventarioFisicoService->generarHojaDeVidaFisico($id);
    }

    public function verElementoMedico($id)
    {
        return $this->inventarioMedicoService->generarHojaDeVidaMedico($id);
    }

    public function verElementoInsumo($id)
    {
        return $this->inventarioInsumoService->generarHojaDeVidaInsumo($id);
    }

    public function obtenerElementoTecnologico($id)
    {
        // Obtén el elemento tecnológico usando el servicio
        $elemento = $this->inventarioTecnologicoService->obtenerElementoTecnologico($id);
    
        // Verifica si el elemento existe
        if (!$elemento) {
            return response()->json(['error' => 'Elemento no encontrado'], 404);
        }
    
        // Pasar el elemento como JSON
        return response()->json($elemento);
    }
    

    public function actualizarElementoTecnologico(Request $request, $id)
    {
        $data = $request->all();
        $this->inventarioTecnologicoService->actualizarElementoTecnologico($id, $data);
        
                return redirect()->back()->with('success', 'Elemento tecnológico actualizado correctamente.');

    }

}
