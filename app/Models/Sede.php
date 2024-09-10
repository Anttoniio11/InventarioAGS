<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $fillable = ['nit','razon_social','departamento','municipio'];

    public function empleados(){
        return $this->belongsToMany(Empleado::class,'id_sede');
    }

}
