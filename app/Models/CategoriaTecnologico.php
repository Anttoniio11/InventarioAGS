<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ElementoTecnologico;

class CategoriaTecnologico extends Model
{
    use HasFactory;

    protected $fillable = ['categoria'];

    protected $table = 'categorias_tecnologicos';
    
    public function elementos_tecnologicos(){
        return $this->hasMany( ElementoTecnologico::class,'id_categoria');
    }
}
