<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\ConfiguracionesMantenimientoModel;
use App\BaseCalculoModel;
use App\UnidadesModel;
use App\FactorAccesoModel;
use App\FactorAmbienteModel;
use App\FactorEstadoUnidad;
use App\FactorGarantiaModel;
use App\FactorHorasDiariasModel;
use Illuminate\Support\Facades\Session;
class MantenimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $configuraciones = ConfiguracionesMantenimientoModel::all();

        return view('admin.configuraciones_mantenimiento',['configuraciones'=>$configuraciones]);
    }

    public function configuraciones(){



        $user = Auth::user();

        return view('admin.base_calculo_rapido',['user'=>$user]);
}


public function factores_mantenimiento(){

    $factor_acceso = FactorAccesoModel::all();
    $factor_ambiente = FactorAmbienteModel::all();
    $factor_estado_unidad = FactorEstadoUnidad::all();
    $factor_garantia = FactorGarantiaModel::all();
    $factor_horas_diarias = FactorHorasDiariasModel::all();

    return view('admin.factores_mantenimiento',[
         'factor_acceso'=>$factor_acceso
        ,'factor_ambiente'=>$factor_ambiente
        ,'factor_estado_unidad'=>$factor_estado_unidad
        ,'factor_garantia'=>$factor_garantia
        ,'factor_horas_diarias'=>$factor_horas_diarias
    ]);
}

    public function base_calculo_rapido(){

        $sistemas = [
            ['value' => 1, 'text' => "Paquetes (RTU)"],
            ['value' => 2, 'text' => "Split DX"],
            ['value' => 3, 'text' => "VRF No Ductados"],
            ['value' => 4, 'text' => "VRF Ductados"],
            ['value' => 5, 'text' => "PTAC/VTAC"],
            ['value' => 6, 'text' => "WSHP"],
            ['value' => 7, 'text' => "Minisplit Inverter"],
            ['value' => 8, 'text' => "Chiller Scroll - Aire"],
            ['value' => 9, 'text' => "Chiller Scroll - Agua"],
            ['value' => 10, 'text' => "Chiller Tornillo - Aire"],
            ['value' => 11, 'text' => "Chiller Tornillo - Agua"],
            ['value' => 12, 'text' => "Extractor"],
            ['value' => 13, 'text' => "Inyector"],
        ];

        $bases = BaseCalculoModel::join('unidades','unidades.id','=','id_unidad')
        ->select('base_calculo_rapido.*','unidades.unidad as unidad_name')->get();

        return view('admin.base_calculo_rapido',['bases'=>$bases,'sistemas'=>$sistemas,]);
    }

    public function get_configuracion($id_configuracion){
        $configuracion = ConfiguracionesMantenimientoModel::find($id_configuracion);
       return response()->json($configuracion);
    }

    public function store_configuracion(Request $request){

        $upadte_configuracion = ConfiguracionesMantenimientoModel::find(intval($request->get('id_configuracion')));
        $upadte_configuracion->configuracion = $request->get('configuracion');
        $upadte_configuracion->valor = $request->get('valor');
        $upadte_configuracion->unidad = $request->get('unidad');
        $upadte_configuracion->update();

       return $upadte_configuracion;
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

        // Obtener el contenido actual de array_sistemas de la sesión
        $array_sistemas = Session::get('array_sistemas', []);

        //reorder contenido array table_count



        // Agregar los nuevos elementos a array_sistemas
        $array_sistemas[] = $array_to_response;

        // Guardar el array actualizado en la sesión
        session(['array_sistemas' => $array_sistemas]);


         // Obtener array_sistemas de la sesión
        $array_sistemas = Session::get('array_sistemas');

        for ($i = 0; $i < count($array_sistemas); $i++) {
            if (is_array($array_sistemas[$i]) && count($array_sistemas[$i]) > 0) {
                $array_sistemas[$i][0] = $i+1; // Editar el primer elemento
            }
        }

        return response()->json($array_sistemas);
    }

    public function delete_reg_table_equipos(Request  $request,$id){
        $array_sistemas = Session::get('array_sistemas');
        $id = $id + 1;

        for ($i = 0; $i < count($array_sistemas); $i++) {
            if($array_sistemas[$i][0] == $id){
                unset($array_sistemas[$i]);
            }
        }

        // Reindexar el array y actualizar el primer elemento de cada subarreglo
        $array_sistemas = array_values($array_sistemas);
        for ($i = 0; $i < count($array_sistemas); $i++) {
            if (is_array($array_sistemas[$i]) && count($array_sistemas[$i]) > 0) {
                $array_sistemas[$i][0] = $i + 1; // Editar el primer elemento
            }
        }


        // Guardar el array actualizado en la sesión
        session(['array_sistemas' => $array_sistemas]);


         // Obtener array_sistemas de la sesión
        $array_sistemas = Session::get('array_sistemas');
        return response()->json($array_sistemas);

    }

}
