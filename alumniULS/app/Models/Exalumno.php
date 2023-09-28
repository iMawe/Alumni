<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exalumno extends Model
{
    protected $table = 'exalumnos';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'correo_electronico',
        'telefono',
        'programa_academico',
        'año_graduacion',
        'ubicacion_actual',
    ];
}
