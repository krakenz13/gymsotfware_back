<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActualizarEstudianteController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $e = Estudiante::find($id);
        if (isset($e)) {
            $e->nombre = $request->nombre;
            $e->apellido = $request->apellido;
            $e->foto = $request->foto;
            $e->cedula = $request->cedula;
            $e->telefono = $request->telefono;
            
        
            if ($e->save()) {
                return response()->json([
                    'data' => $e,
                    'mensaje' => " estudiante actualizado con exito",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "no se actulizo el estudiante.",

                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "no existe el estudiante.",

            ]);
        }
    }
}
