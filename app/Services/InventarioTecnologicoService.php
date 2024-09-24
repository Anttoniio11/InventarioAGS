<?php

namespace App\Services;

interface InventarioTecnologicoService{

    public function obtenerInventarioTecnologico();
    public function crearElementoTecnologico(array $data);
    public function generarHojaDeVidaTecnologico($id);
    public function obtenerDatosForaneos();
    // public function editarElementoTecnologico(array $data, $id);
    // public function obtenerElementoTecnologicoPorId($id);
    public function obtenerCategoriasTecnologico();
    public function obtenerElementoTecnologico($id);
    public function actualizarElementoTecnologico($id, $data);
}