<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class estudiantes extends Model
{
    use HasFactory;
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}
