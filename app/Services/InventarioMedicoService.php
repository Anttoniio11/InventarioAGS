<?php

namespace App\Services;

interface InventarioMedicoService{

    public function obtenerInventarioMedico();
    public function crearElementoMedico(array $data);
    public function generarHojaDeVidaMedico($id);
    public function obtenerDatosForaneos();
    public function obtenerElementoMedico($id);
    public function actualizarElementoMedico($id, $data);

}