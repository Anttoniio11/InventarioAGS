<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionTecnologico extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio','fecha_fin','tipo','observacion'];

    public function empleado(){
        return $this->belongsTo(Empleado::class,'id_empleado');
    }

    public function elementoTecnologico(){
        return $this->belongsTo(ElementoTecnologico::class,'id_elemento_tecnologico');
    }
}
