<?php

namespace App\Http\Controllers\EstudiantesMentorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstudianteMentoria;
use Illuminate\Support\Facades\Log;

class ConsultaEstudianteMentoriaController extends Controller
{
    public function show(string $id)
    {
        Log::info("show");
        $student = EstudianteMentoria::where($id);
        if (isset($student)) {
            return response()->json([
                'data' => $student,
                'mensaje' => " estudiante  con exito",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'mensaje' => "no existe el estudiante.",

            ]);

        }
    }
}
