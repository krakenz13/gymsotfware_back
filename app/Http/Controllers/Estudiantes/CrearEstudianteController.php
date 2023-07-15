<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrearEstudianteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inpunts = $request->input();
        $e = Estudiante::create($inpunts);
        return response()->json([
            'data' => $e,
            'mensaje' => " estudiante actualizado con exito",
        ]);
    }

}
