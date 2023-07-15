<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultaEstudianteController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::info("show");
        $student = Estudiante::find($id);
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
