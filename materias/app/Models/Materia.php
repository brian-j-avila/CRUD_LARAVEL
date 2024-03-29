<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre',
        'duracion',
        // Agrega otros campos aquí si los tienes
    ];
}
