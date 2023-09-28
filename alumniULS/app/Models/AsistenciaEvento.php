<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaEvento extends Model
{
    protected $table = 'asistencia_eventos';

    protected $fillable = [
        'id_exalumno',
        'id_evento',
        'asistio',
    ];

    public function exalumno()
    {
        return $this->belongsTo(Exalumno::class, 'id_exalumno');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }
}
