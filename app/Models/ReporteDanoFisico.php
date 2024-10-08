<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDanoFisico extends Model
{
    use HasFactory;

    protected $table = 'reportes_danos_fisicos'; 

    protected $fillable = [
        'fecha',
        'descripcion',
        'nivel_daño'
    ];


    public function responsable(){
        return $this->belongsTo(Empleado::class,'id_responsable');
    }
    public function encargado(){
        return $this->belongsTo(Empleado::class,'id_encargado');
    }
    public function elementoFisico(){
        return $this->belongsTo(ElementoFisico::class,'id_elemento_fisico');
    }


}
