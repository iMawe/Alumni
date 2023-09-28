<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembresiaRedes extends Model
{
    protected $table = 'membresia_redes';

    protected $fillable = [
        'id_exalumno',
        'id_red_social',
    ];

    public function exalumno()
    {
        return $this->belongsTo('App\Exalumno', 'id_exalumno');
    }

    public function redSocial()
    {
        return $this->belongsTo('App\RedSocial', 'id_red_social');
    }
}
