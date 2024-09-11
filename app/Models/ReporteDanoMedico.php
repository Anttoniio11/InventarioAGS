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
