<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaInsumo extends Model
{
    use HasFactory;

    protected $table = 'categorias_insumos';

    protected $fillable = ['codigo', 'categoria'];


    public function elementosInsumos() {
        return $this->hasMany(ElementoInsumo::class, 'id_categoria');
    }

}
