<?php

namespace App\Services;

interface InventarioInsumoService{

    public function obtenerInventarioInsumo();
    public function crearElementoInsumo(array $data);
    public function generarHojaDeVidaInsumo($id);
    public function obtenerDatosForaneos();
    
}