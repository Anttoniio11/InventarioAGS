<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'nombre',
        'telefono',
        'email',
        'direccion'
    ];

    public function facturas() {
        return $this->hasMany(Factura::class, 'id_proveedor');
    }

}
