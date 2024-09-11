<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoElemento extends Model
{
    use HasFactory;

    protected $table = 'estado_elementos'; 
    
    protected $fillable = ['estado','descripcion'];


    public function elementos_tecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_estado');
    }
}
