<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UnidadesModel;
use App\SistemasModel;


class OperacionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Lógica para obtener los resultados de las operaciones
        return view('operaciones.operaciones_index');
    }

    public function traer_sistemas_calculo_coordinacion($id){
        $sistema = SistemasModel::where('id',$id)->first()->name;
        return response()->json($sistema);
    }
}
