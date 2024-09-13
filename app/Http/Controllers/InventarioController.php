<?php

namespace App\Http\Controllers;

use App\Services\InventarioService;
use Illuminate\Http\Request;

class InventarioController extends Controller
{

    protected $inventarioService;

    public function __construct(InventarioService $inventarioService) {
        $this->inventarioService = $inventarioService;
    }

    public function inventarioTecnologico(){

        $elementosTecnologicos = $this->inventarioService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioService->obtenerCategoriasTecnologico();

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos', 'categoriasTecnologicos'));

        }

    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos',compact('elementosFisicos', 'categoriasFisicos'));

        }

    public function inventarioMedico(){

        $elementosMedicos = $this->inventarioService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos',compact('elementosMedicos', 'categoriasMedicos'));

        }

    public function inventarioInsumo(){

        $elementosInsumos = $this->inventarioService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos',compact('elementosInsumos', 'categoriasInsumos'));

        }
}
