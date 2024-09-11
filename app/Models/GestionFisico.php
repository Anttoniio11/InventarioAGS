<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionFisico extends Model
{
    use HasFactory;

    protected $table = 'gestiones_fisicos'; 

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'observacion'
    ];


    public function empleado(){
        return $this->belongsTo(Empleado::class,'id_empleado');
    }

    public function elementoFisico(){
        return $this->belongsTo(ElementoFisico::class,'id_elemento_fisico');
    }
}
