<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OportunidadEmpleo extends Model
{
    protected $table = 'oportunidades_empleo';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_publicacion',
        'empresa',
        'ubicacion',
    ];
}
