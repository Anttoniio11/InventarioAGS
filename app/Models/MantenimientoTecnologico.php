<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoTecnologico extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos_tecnologicos';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo_mantenimiento',
        'observacion',
        'estado',
        'responsable'
    ];

    public function elemento()
    {
        return $this->belongsTo(ElementoTecnologico::class, 'id_elemento_tecnologico');
    }
}
