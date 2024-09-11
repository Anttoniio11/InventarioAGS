<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoMedico extends Model
{
    use HasFactory;

    protected $table = 'elementos_medicos'; 

    protected $fillable = [
        'codigo',
        'marca', 
        'modelo',
        'serie',
        'registro_sanitario',
        'ubicacion_interna',
        'disponibilidad',
        'codigo_QR',
    ];


}
