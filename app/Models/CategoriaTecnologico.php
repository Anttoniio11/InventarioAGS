<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ElementoTecnologico;

class CategoriaTecnologico extends Model
{
    use HasFactory;

    protected $table = 'categorias_tecnologicos';

    protected $fillable = ['categoria'];

    
    public function elementosTecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_categoria');
    }
}
