<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMedico extends Model
{
    use HasFactory;

    public function elementoMedico(){
        return $this->belongsTo(ElementoMedico::class,'id_elemento_medico');
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class,'id_empleado');
    }
}
