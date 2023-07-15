<?php

namespace App\Http\Controllers\EstudiantesMentorias;

use App\Http\Controllers\Controller;
use App\Models\EstudianteMentoria;

use Illuminate\Http\Request;

class CrearEstudianteMentoriaController extends Controller
{
    public function store(Request $request)
    {
        $inpunts = $request->input();
        $e = EstudianteMentoria::create($inpunts);
        return response()->json([
            'data' => $e,
            'mensaje' => " membresia actualizada",
        ]);

    }
}
