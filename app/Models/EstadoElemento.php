<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoElemento extends Model
{
    use HasFactory;
    protected $fillable = ['estado','descripcion'];

    public function elementosTecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_estado');
    }

    public function elementosMedicos(){
        return $this->hasMany(ElementoMedico::class,'id_estado');
    }
    
    public function elementosFisicos(){
        return $this->hasMany(ElementoFisico::class,'id_estado');
    }
}
