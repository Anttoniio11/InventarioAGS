<?php

namespace App\Services;

interface InventarioMedicoService{

    public function obtenerInventarioMedico();
    public function obtenerCategoriasMedico();
    public function crearElementoMedico(array $data);
  
}