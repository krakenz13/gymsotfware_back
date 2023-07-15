<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteMentoria extends Model
{
    use HasFactory;

    public $table ="estudiantes_mentorias";
    
    protected $fillable = [
        'estudiante_id',
        'mentoria_id',
        'fecha_inicio',
        'estado',
    ];
    
}