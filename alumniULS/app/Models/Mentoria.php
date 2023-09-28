<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoria extends Model
{
    protected $table = 'mentorias';

    protected $fillable = [
        'id_mentor',
        'id_estudiante',
        'tema',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function mentor()
    {
        return $this->belongsTo(Exalumno::class, 'id_mentor');
    }

    public function estudiante()
    {
        return $this->belongsTo(Exalumno::class, 'id_estudiante');
    }
}
