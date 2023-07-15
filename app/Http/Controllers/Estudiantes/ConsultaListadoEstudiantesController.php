<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Support\Str;

class ConsultaListadoEstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $search = null)
    {
        $arraySearch = explode(' ', $search);
        $search = Str::replace(' ', '%', $search);

        $students = Estudiante
        //::leftjoin('estudiantes_mentorias as em', 'estudiantes.id', '=', 'em.estudiante_id')
        //->leftjoin('mentorias as m', 'em.mentoria_id', '=', 'm.id')
        ::where('estudiantes.nombre', 'LIKE','%'.$search.'%')
        ->orWhere('estudiantes.apellido', 'LIKE','%'.$search.'%')
        ->orWhere('estudiantes.cedula', 'LIKE','%'.$search.'%')
        ->orWhereRaw("CONCAT(estudiantes.nombre,' ', estudiantes.apellido) LIKE '%".$search."%'");

        foreach ($arraySearch as $item) {
            $students = $students->orWhere('nombre', 'LIKE','%'.$item.'%')
            ->orWhere('apellido', 'LIKE','%'.$item.'%');
        }

        $students = $students->select(
            'estudiantes.id', 
            'estudiantes.cedula', 
            'estudiantes.nombre', 
            'estudiantes.apellido', 
            'estudiantes.telefono', 
            'estudiantes.foto'
            // 'em.fecha_inicio',
            // 'em.estado',
            // 'em.mentoria_id',
            // 'm.mentoria',
            // 'm.duracion'
        )->get();
        return $students;
    }

}
