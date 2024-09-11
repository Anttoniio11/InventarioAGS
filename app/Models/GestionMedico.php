<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMedico extends Model
{
    use HasFactory;

    protected $table = 'gestiones_medicos'; 

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'observacion'
    ];


}
