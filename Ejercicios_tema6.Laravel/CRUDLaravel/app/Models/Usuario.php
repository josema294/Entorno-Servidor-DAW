<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Si tu tabla tiene un nombre diferente al esperado por convención
    // puedes especificarlo con la propiedad $table
    protected $table = 'usuarios';

    // Si tu tabla no tiene las columnas 'created_at' y 'updated_at'
    // establece la propiedad $timestamps a false
    public $timestamps = false;

    // Fillable define los campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'apellidos' /*, otros campos que necesites */];
}
