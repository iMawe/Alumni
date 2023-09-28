<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    protected $table = 'comunicaciones';

    protected $fillable = [
        'asunto',
        'mensaje',
        'fecha_envio',
        'destinatario_id',
    ];

    public function destinatario()
    {
        return $this->belongsTo(Exalumno::class, 'destinatario_id');
    }
}
