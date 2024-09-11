<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDanoMedico extends Model
{
    use HasFactory;

    protected $table = 'reportes_danos_medicos'; 

    protected $fillable = [
        'fecha',
        'descripcion',
        'nivel_daño'
    ];
    
}
