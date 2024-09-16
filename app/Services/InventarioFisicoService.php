<?php

namespace App\Services;

interface InventarioFisicoService{

    public function obtenerInventarioFisico();
    public function obtenerCategoriasFisico();
    public function crearElementoFisico(array $data);
    
}