<?php

namespace App\Services;

interface InventarioInsumoService{

    public function obtenerInventarioInsumo();
    public function obtenerCategoriasInsumo();
    public function crearElementoInsumo(array $data);
    public function generarHojaDeVidaInsumo($id);
    
}