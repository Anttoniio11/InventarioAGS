<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoTecnologico extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio','fecha_fin','tipo_mantenimiento','observacion','estado','responsable'];

    public function elemento_tecnologico(){
        return $this->belongsTo(ElementoTecnologico::class,'id_elementos_tecnologicos');
    }
}
