<?php

namespace App\Http\Controllers\EstudiantesMentorias;

use App\Http\Controllers\Controller;
use App\Models\EstudianteMentoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EliminarEstudianteMentoriaController extends Controller
{
    public function destroy($id)
    {
        $e = EstudianteMentoria::find($id);
        if (isset($e)) {
            $res =Estudiante::destroy($id);
            if($res){
                return response()->json([
                    'data' => $e,
                    'mensaje' => "La mentoria no fue elimida con exito",
                ]);

            }else{
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Mentoria  no existe",
                ]);
            }
   
        }else{
            return response()->json([
                'data' =>$e,
                'mensaje' => "La mentoria no existe.",

            ]);

        }
    }
}
