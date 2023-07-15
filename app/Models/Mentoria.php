<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoria extends Model
{
    public $table ="mentorias";
    
    protected $fillable = [
        'id',
        'mentoria',
        'duracion'
    ];

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class,"estudiantes_mentorias");
    }

}
