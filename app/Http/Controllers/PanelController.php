<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PanelService;

class PanelController extends Controller
{
    protected $panelService;

    public function __construct(PanelService $panelService)
    {
        $this->panelService = $panelService;
    }

    public function panel()
    {
        $cantidadElementosTecnologicos = $this->panelService->obtenerCantidadElementosTecnologicos();
        $cantidadElementosFisicos = $this->panelService->obtenerCantidadElementosFisicos();
        $cantidadElementosMedicos = $this->panelService->obtenerCantidadElementosMedicos();
        $cantidadElementosInsumos = $this->panelService->obtenerCantidadElementosInsumos();

        // dd($cantidadElementosTecnologicos, $cantidadElementosFisicos);

        return view('panel.panel', [
            'cantidadElementosTecnologicos' => $cantidadElementosTecnologicos,
            'cantidadElementosFisicos' => $cantidadElementosFisicos,
            'cantidadElementosMedicos' => $cantidadElementosMedicos,
            'cantidadElementosInsumos' => $cantidadElementosInsumos,
        ]);
    }
}
