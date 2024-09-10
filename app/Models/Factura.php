<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public function proveedor() {
        return $this->belongsTo(Proveedore::class, 'id_proveedor');
    }

    public function elementosInsumos() {
        return $this->hasMany(ElementoInsumo::class, 'id_factura');
    }
}
