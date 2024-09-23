<?php

namespace App\Services;

interface CategoriaMedicoService{

    public function obtenerCategoriasMedico();
    public function crearCategoriaMedico(array $data); 
    
}