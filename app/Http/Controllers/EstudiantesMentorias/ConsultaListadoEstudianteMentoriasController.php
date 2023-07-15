<?php

namespace App\Http\Controllers\EstudiantesMentorias;

use App\Http\Controllers\Controller;
use App\Models\EstudianteMentoria;
use App\Models\Estudiante;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ConsultaListadoEstudianteMentoriasController extends Controller
{
    public function index(Estudiante $estudiante)
    {
        $estudianteMentorias = Estudiante::leftjoin(
            'estudiantes_mentorias as em', 
            'estudiantes.id', '=', 'em.estudiante_id'
        )
        ->leftjoin(
            'mentorias as m', 
            'em.mentoria_id', '=', 'm.id'
        )
        ->where('estudiantes.id', '=',$estudiante->id);

        $estudianteMentorias = $estudianteMentorias->select(
            'em.id', 
            'em.fecha_inicio',
            'em.estado',
            'em.mentoria_id',
            'm.mentoria',
            'm.duracion',
            'estudiantes.nombre',
            'estudiantes.apellido',
            'estudiantes.cedula',
            'estudiantes.telefono' 
        )->get();

        return $estudianteMentorias;
    }
}
