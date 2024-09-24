<?php

namespace App\Services;

interface PanelService{

    public function obtenerCantidadElementosTecnologicos(); 
    public function obtenerCantidadElementosFisicos(); 
    public function obtenerCantidadElementosMedicos();
    public function obtenerCantidadElementosInsumos();

} 