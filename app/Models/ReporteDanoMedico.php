<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDanoMedico extends Model
{
    use HasFactory;

    public function elementoMedico(){
        return $this->belongsTo(ElementoMedico::class,'id_elemento_medico');
    }

    public function responsable(){
        return $this->belongsTo(Empleado::class,'id_responsable');
    }

    public function encargado(){
        return $this->belongsTo(Empleado::class,'id_encargado');
    }
}
