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

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos'));

        }

    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioService->obtenerInventarioFisico();

        return view('inventario.fisicos.elementos',compact('elementosFisicos'));

        }

    public function inventarioMedico(){

        $elementosMedicos = $this->inventarioService->obtenerInventarioMedico();

        return view('inventario.medicos.elementos',compact('elementosMedicos'));

        }

    public function inventarioInsumo(){

        $elementosInsumos = $this->inventarioService->obtenerInventarioInsumo();

        return view('inventario.insumos.elementos',compact('elementosInsumos'));

        }
}
