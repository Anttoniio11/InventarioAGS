<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    public function elementosInsumos() {
        return $this->hasMany(ElementoInsumo::class, 'id_sede');
    }

    public function empleados(){
        return $this->hasMany(Empleado::class,'id_empleado');
    }
}
