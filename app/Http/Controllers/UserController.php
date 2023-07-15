<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inpunts = $request->input();
        $inpunts["password"] = Hash::make(trim($request->password));
        $e = Users::create($inpunts);
        return response()->json([
            'data' => $e,
            'mensaje' => " actualizado con exito",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $e = Users::find($id);
        if (isset($e)) {
            return response()->json([
                'data' => $e,
                'mensaje' => " encontrado  con exito",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'mensaje' => "no existe .",

            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $e = Users::find($id);
        if (isset($e)) {
            $e->name = $request->name;
            $e->email = $request->email;
            $e->password = $request->password;
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $e = Users::find($id);
        if (isset($e)) {
            $res = Users::destroy($id);
            if($res){
                return response()->json([
                    'data' => $e,
                    'mensaje' => "elimidado con exito",
                ]);

            }else{
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"no existe.",


                ]);
            }
   
        }else{
            return response()->json([
                'data' =>$e,
                'mensaje' => " no existe el estudiante.",

            ]);

        }
    }
}
