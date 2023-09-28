<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = [
        'nombre_informe',
        'descripcion',
        'fecha_generacion',
    ];
}
