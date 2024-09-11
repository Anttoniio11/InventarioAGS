<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['rol'];

    public function users(){
        return $this->hasMany(User::class, 'id_rol');
    }

    public function empleados(){
        return $this->hasMany(Empleado::class, 'id_rol');
    }
}
