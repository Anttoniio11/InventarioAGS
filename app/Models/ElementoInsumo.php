<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoInsumo extends Model
{
    use HasFactory;

    protected $table = 'elementos_insumos';

    public function categoriaInsumo() {
        return $this->belongsTo(CategoriaInsumo::class, 'id_categoria');
    }

    public function factura() {
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    public function sede() {
        return $this->belongsTo(Sede::class, 'id_sede');
    }
}
