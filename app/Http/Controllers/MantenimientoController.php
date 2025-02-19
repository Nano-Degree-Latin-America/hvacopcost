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
use App\SistemasModel;
use Illuminate\Support\Facades\Auth;
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

        $sistemas = SistemasModel::all();


        $bases = BaseCalculoModel::join('sistemas_hvac','sistemas_hvac.id','=','sistema')
        ->join('unidades','unidades.id','=','id_unidad')
        ->select('base_calculo_rapido.*','unidades.unidad as unidad_name','sistemas_hvac.name as sistema_name')
        ->get();

        return view('admin.base_calculo_rapido',['bases'=>$bases,'sistemas'=>$sistemas,]);
    }

    public function get_configuracion($id_configuracion){
        $configuracion = ConfiguracionesMantenimientoModel::find($id_configuracion);
        return response()->json($configuracion);
    }

    public function get_calculo_base($id_base){

        $base_calculo = BaseCalculoModel::where('base_calculo_rapido.id','=',$id_base)->join('sistemas_hvac','sistemas_hvac.id','=','sistema')
        ->join('unidades','unidades.id','=','id_unidad')
        ->select('base_calculo_rapido.*','unidades.unidad as unidad_name','sistemas_hvac.name as sistema_name')
        ->first();

        return response()->json($base_calculo);
    }

    public function store_base_calculo(Request $request){

        $upadte_base_calculo = BaseCalculoModel::find(intval($request->get('id_calculo_base')));
        $upadte_base_calculo->costo_instalacion = $request->get('costo_instalado');
        $upadte_base_calculo->unidad_costo_instalacion = $request->get('unidad');
        $upadte_base_calculo->update();

       return $upadte_base_calculo;
    }

    public function store_factor(Request $request){

        $id = $request->get('id_factor');
        $factor = $request->get('tipo_factor');

        if($factor == 'factor_ambiente'){
            $factor_update = FactorAmbienteModel::find($id);
        }

        if($factor == 'factor_acceso'){
            $factor_update = FactorAccesoModel::find($id);
        }

        if($factor == 'factor_estado_unidad'){
            $factor_update = FactorEstadoUnidad::find($id);
        }

        if($factor == 'factor_estado_unidad'){
            $factor_update = FactorEstadoUnidad::find($id);
        }

        if($factor == 'factor_garantia'){
            $factor_update = FactorGarantiaModel::find($id);
        }

        if($factor == 'factor_horas_diarias'){
            $factor_update = FactorHorasDiariasModel::find($id);
        }

/*         $factor_update->costo_instalacion = $request->get('costo_instalado');
 */        $factor_update->valor = $request->get('valor');
           $factor_update->update();

       return $factor_update;
    }

    public function get_factor($id,$factor){
        if($factor == 'factor_ambiente'){
            $factor_set = FactorAmbienteModel::find($id);
        }

        if($factor == 'factor_acceso'){
            $factor_set = FactorAccesoModel::find($id);
        }

        if($factor == 'factor_estado_unidad'){
            $factor_set = FactorEstadoUnidad::find($id);
        }

        if($factor == 'factor_estado_unidad'){
            $factor_set = FactorEstadoUnidad::find($id);
        }

        if($factor == 'factor_garantia'){
            $factor_set = FactorGarantiaModel::find($id);
        }

        if($factor == 'factor_horas_diarias'){
            $factor_set = FactorHorasDiariasModel::find($id);
        }


        return response()->json($factor_set);
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

    public function get_data_form(Request $request){
        if ($request->ajax()) {

            $sistema = $request->get('sistema_mantenimiento');
            $unidad = $request->get('unidad_mantenimiento');
            $capacidad_termica_mantenimiento = $request->get('capacidad_termica_mantenimiento');
            $cantidad_unidades_mantenimiento = $request->get('cantidad_unidades_mantenimiento');
            $yrs_vida_mantenimiento = $request->get('yrs_vida_mantenimiento');
            $tipo_acceso_mantenimiento = $request->get('tipo_acceso_mantenimiento');
            $estado_unidad_mantenimiento = $request->get('estado_unidad_mantenimiento');
            $cambio_filtros_mantenimiento = $request->get('cambio_filtros_mantenimiento');
            $tipo_ambiente_mantenimiento = $request->get('tipo_ambiente_mantenimiento');
            $ocupacion_semanal_mantenimiento = $request->get('ocupacion_semanal_mantenimiento');


            $fg = 1.03;
            $costo_instalado = $this->obtener_costo_instalado($unidad);
            $rav = $this->obtener_rav($unidad);
            $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
            $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
            $feu = $this->obtener_feu($estado_unidad_mantenimiento);
            $fav = $this->obtener_fav($yrs_vida_mantenimiento);
            $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);




             $res_formula_calculo = $this->formula_calculo($capacidad_termica_mantenimiento,$cantidad_unidades_mantenimiento,$costo_instalado,$rav,$fa,$fta,$feu,$fav,$fhd,$fg);

           /*  dd($request->all()); */
             /* dd($capacidad_termica_mantenimiento.'_'.$cantidad_unidades_mantenimiento.'_'.$costo_instalado.'_'.$rav.'_'.$fa.'_'.$fta.'_'.$feu.'_'.$fav.'_'.$fhd); */
            // La petición es una petición AJAX
            return $res_formula_calculo;
        } else {
            // La petición no es una petición AJAX
            return response()->json(['message' => 'No es una petición AJAX']);
        }
    }

   public function obtener_costo_instalado($unidad){
        $id_unidad = UnidadesModel::where('identificador','=',$unidad)->first()->id;
        $costo_instalado = BaseCalculoModel::where('id_unidad','=',$id_unidad)->first()->costo_instalacion;
        return $costo_instalado;
   }

   public function obtener_rav($unidad){
    $id_unidad = UnidadesModel::where('identificador','=',$unidad)->first()->id;
    $rav = BaseCalculoModel::where('id_unidad','=',$id_unidad)->first()->rav;
    return $rav;
   }


   public function obtener_fa($tipo_ambiente_mantenimiento){
    $fa = FactorAmbienteModel::find($tipo_ambiente_mantenimiento)->valor;
    return $fa;
   }

   public function obtener_fta($tipo_acceso_mantenimiento){
    $fta = FactorAccesoModel::find($tipo_acceso_mantenimiento)->valor;
    return $fta;
   }


   public function obtener_feu($estado_unidad_mantenimiento){
    $feu = FactorEstadoUnidad::find($estado_unidad_mantenimiento)->valor;
    return $feu;
   }

   public function obtener_fav($yrs_vida_mantenimiento){
        //1/((1-0.012)^Años de vida)

        //(1-0.012)
        $resta = 1-0.012;

        //restsa^Años de vida
        $resta_pot_yrs_life = pow($resta,$yrs_vida_mantenimiento);

        //1/resta_pot_yrs_life
        $fav = 1/$resta_pot_yrs_life;

    return $fav;
   }

   public function obtener_fhd($ocupacion_semanal_mantenimiento){
        switch ($ocupacion_semanal_mantenimiento) {
            case 'm_50':
                return 0.95;
            break;

            case '168':
                return 1.08;
            break;

            case '51_167':
                return 1;
            break;
            default:

            break;
        }
   }

   public function set_options_factor_mantenimiento(){
     $fta = FactorAmbienteModel::all();
     return response()->json($fta);
   }

   public function set_options_factor_acceso(){
    $fta = FactorAccesoModel::all();
    return response()->json($fta);
  }

  public function set_options_factor_estado_unidad(){
    $feu = FactorEstadoUnidad::all();
    return response()->json($feu);
  }

  public function formula_calculo($capacidad_termica_mantenimiento,$cantidad_unidades_mantenimiento,$costo_instalado,$rav,$fa,$fta,$feu,$fav,$fhd,$fg){
             //(Capacidad Térmica) x (Cantidad de Equipos) x (Costo Instalado)  x RAV x FA x FTA x FEU x FAV x FHD x FG
 $res = $capacidad_termica_mantenimiento*$cantidad_unidades_mantenimiento*$costo_instalado*$rav*$fa*$fta*$feu*$fav*$fhd*$fg;

    return $res;
  }


}
