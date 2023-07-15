<?php

namespace App\Http\Controllers\Mentorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentoria;

class ConsultaListadoMentoriasController extends Controller
{
    public function index()
    {
        $mentorias = Mentoria::select("id", "mentoria", "duracion")->get();
        return $mentorias;
    }
}
