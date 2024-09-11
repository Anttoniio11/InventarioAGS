<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoElemento extends Model
{
    use HasFactory;
    protected $fillable = ['estado','descripcion'];

    public function elementos_tecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_estado');
    }

    public function elementos_medicos(){
        return $this->hasMany(ElementoMedico::class,'id_estado');
    }
    
    public function elementos_fisicos(){
        return $this->hasMany(ElementoFisico::class,'id_estado');
    }
}
