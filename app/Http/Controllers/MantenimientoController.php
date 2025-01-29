<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\UnidadesModel;
class MantenimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function traer_datos_tarjeta(Request $request)
    {

        $array_to_response = [];

        $sistemas = [
                    '1' => 'Paquetes (RTU)',
                    '2' => 'Split DX',
                    '3' => 'VRF No Ductados',
                    '4' => 'VRF Ductados',
                    '5' => 'PTAC/VTAC',
                    '6' => 'WSHP',
                    '7' => 'Minisplit Inverter'
        ];

        $sistema = $sistemas[$request->values[1]];
        $unidad = $request->values[2];
        $id_marca = $request->values[3];
        $id_modelo = $request->values[4];
        $marca = MarcasEmpresaModel::find($id_marca);
        $modelo = ModelosEmpresaModel::find($id_modelo);
        $unidad_aux = UnidadesModel::where('identificador','=',$unidad)->first()->unidad;

        array_push(
            $array_to_response,
            $request->values[0],
            $sistema,
            $unidad_aux,
            $marca->marca,
            $modelo->modelo,
            $request->values[5],
            $request->values[6],
            $request->values[7],
            strtoupper($request->values[8]),
            strtoupper($request->values[9])
        );

        return response()->json($array_to_response);
    }
}
