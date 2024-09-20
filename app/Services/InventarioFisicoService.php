<?php

namespace App\Services;

interface InventarioFisicoService{

    public function obtenerInventarioFisico();
    public function crearElementoFisico(array $data); 
    public function generarHojaDeVidaFisico($id);
    public function obtenerDatosForaneos();

} 