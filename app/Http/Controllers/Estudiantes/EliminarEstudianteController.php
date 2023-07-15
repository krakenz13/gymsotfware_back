<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EliminarEstudianteController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $e = Estudiante::find($id);
        if (isset($e)) {
            $res =Estudiante::destroy($id);
            if($res){
                return response()->json([
                    'data' => $e,
                    'mensaje' => "El estudiante fue elimidado con exito",
                ]);

            }else{
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Estudiante no existe",
                ]);
            }
   
        }else{
            return response()->json([
                'data' =>$e,
                'mensaje' => "Estudiante no existe.",

            ]);

        }
    }
}
