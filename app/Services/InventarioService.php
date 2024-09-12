<?php

namespace App\Services;

interface InventarioService{

    public function obtenerInventarioTecnologico();
    public function obtenerInventarioFisico();
    public function obtenerInventarioMedico();
    public function obtenerInventarioInsumo();
    
}