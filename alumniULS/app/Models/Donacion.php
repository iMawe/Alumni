<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';

    protected $fillable = [
        'id_exalumno',
        'monto',
        'fecha_donacion',
    ];

    public function exalumno()
    {
        return $this->belongsTo(Exalumno::class, 'id_exalumno');
    }
}
