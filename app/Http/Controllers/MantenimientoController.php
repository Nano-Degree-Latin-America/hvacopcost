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
use App\ProjectsModel;
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

    public function edit_project_manteinance($id){

        $project =  ProjectsModel::where('projects.id','=',$id)
        ->join('mantenimiento_projects','mantenimiento_projects.id_project','=','projects.id')
        ->join('mano_obra_horas','mano_obra_horas.id_project','=','projects.id')
        ->select('projects.*','mantenimiento_projects.*','mano_obra_horas.*')
        ->get();


        return view('mantenimiento.edit',['project'=>$project]);
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
        $acceso = FactorAccesoModel::where('id','=',$request->values[8])->first()->factor;
        $estado = FactorEstadoUnidad::where('id','=',$request->values[9])->first()->factor;

        array_push(
            $array_to_response,
            $request->values[0],
            $sistema,   //sistema_mantenimiento
            $unidad_aux,  //unidad_mantenimiento
            $marca->marca,  //marca_mantenimiento
            $modelo->modelo,  //modelo_mantenimiento
            $request->values[5],  //capacidad_termica_mantenimiento
            $request->values[6],  //cantidad_unidades_mantenimiento
            $request->values[7],  //yrs_vida_mantenimiento
            strtoupper($acceso),  //tipo_acceso_mantenimiento
            strtoupper($estado),  //estado_unidad_mantenimiento
            $request->values[10].'_hidden',  //horas_diarias_mantenimiento
            $request->values[11].'_hidden',   //cambio_filtros_mantenimiento
            $request->values[12].'_hidden',   //costo_filtro_mantenimiento
            $request->values[13].'_hidden',//cantidad_filtros_mantenimiento
            $unidad.'_hidden',
        );

        //dd($array_to_response);
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

    public function edit_regstro(Request  $request,$id){
        $array_sistemas = Session::get('array_sistemas');
        $arry_res_sistema = [];
        $id = $id + 1;


      /*   $sistemas = [
            'Paquetes (RTU)' => '1',
            'Split DX' => '2',
            'VRF No Ductados' => '3',
            'VRF Ductados' => '4',
            'PTAC/VTAC' => '5',
            'WSHP' => '6',
            'Minisplit Inverter' => '7'
        ];



        $unidad = $request->values[2];
        $id_marca = $request->values[3];
        $id_modelo = $request->values[4];
        $marca = MarcasEmpresaModel::find($id_marca);
        $modelo = ModelosEmpresaModel::find($id_modelo);
        $unidad_aux = UnidadesModel::where('identificador','=',$unidad)->first()->unidad;
        $acceso = FactorAccesoModel::where('id','=',$request->values[8])->first()->factor;
        $estado = FactorEstadoUnidad::where('id','=',$request->values[9])->first()->factor; */

        for ($i = 0; $i < count($array_sistemas); $i++) {
            if($array_sistemas[$i][0] == $id){

                $id_sistema = SistemasModel::where('name','=',$array_sistemas[$i][1])->first()->id;
                $id_unidad = UnidadesModel::where('unidad','=',$array_sistemas[$i][2])->first()->identificador;
                $marca = MarcasEmpresaModel::where('marca','=',$array_sistemas[$i][3])
                ->where('id_empresa','=',Auth::user()->id_empresa)
                ->first()->id;
                $modelo = ModelosEmpresaModel::where('modelo','=',$array_sistemas[$i][4])
                ->where('id_empresa','=',Auth::user()->id_empresa)
                ->first()->id;

                $acceso = FactorAccesoModel::where('factor','=',ucfirst($array_sistemas[$i][8]))->first()->id;
                $estado = FactorEstadoUnidad::where('factor','=',ucfirst( $array_sistemas[$i][9]))->first()->id;

                $horas_diarias_aux = explode('_',$array_sistemas[$i][10]);
                $horas_diarias = $horas_diarias_aux[0];

                $cambio_filtros_aux = explode('_',$array_sistemas[$i][11]);
                $cambio_filtros = $cambio_filtros_aux[0];

                $costo_filtros_aux = explode('_', $array_sistemas[$i][12]);
                $costo_filtros = $costo_filtros_aux[0];

                $cantidad_filtros_aux = explode('_', $array_sistemas[$i][13]);
                $cantidad_filtros = $cantidad_filtros_aux[0];

                array_push(
                    $arry_res_sistema,
                    $array_sistemas[$i][0],
                    $id_sistema,  //sistema_mantenimiento
                    $id_unidad,  //unidad_mantenimiento
                    $marca,  //marca_mantenimiento
                    $modelo,  //modelo_mantenimiento
                    $array_sistemas[$i][5],  //capacidad_termica_mantenimiento
                    $array_sistemas[$i][6],  //cantidad_unidades_mantenimiento
                    $array_sistemas[$i][7],  //yrs_vida_mantenimiento
                    $acceso,  //tipo_acceso_mantenimiento
                    $estado,  //estado_unidad_mantenimiento
                    $horas_diarias,  //horas_diarias_mantenimiento
                    $cambio_filtros,   //cambio_filtros_mantenimiento
                    $costo_filtros,   //costo_filtro_mantenimiento
                    $cantidad_filtros,    //cantidad_filtros_mantenimiento
                );
            }
        }


        return response()->json($arry_res_sistema);

    }

    public function update_registro(Request  $request,$id){
        $array_sistemas = Session::get('array_sistemas');

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
        $acceso = FactorAccesoModel::where('id','=',$request->values[8])->first()->factor;
        $estado = FactorEstadoUnidad::where('id','=',$request->values[9])->first()->factor;

       /*  array_push(
            $array_to_response,
            $request->values[0],
            $sistema,   //sistema_mantenimiento
            $unidad_aux,  //unidad_mantenimiento
            $marca->marca,  //marca_mantenimiento
            $modelo->modelo,  //modelo_mantenimiento
            $request->values[5],  //capacidad_termica_mantenimiento
            $request->values[6],  //cantidad_unidades_mantenimiento
            $request->values[7],  //yrs_vida_mantenimiento
            strtoupper($acceso),  //tipo_acceso_mantenimiento
            strtoupper($estado),  //estado_unidad_mantenimiento
            $request->values[10].'_hidden',  //horas_diarias_mantenimiento
            $request->values[11].'_hidden',   //cambio_filtros_mantenimiento
            $request->values[12].'_hidden',   //costo_filtro_mantenimiento
            $request->values[13].'_hidden',    //cantidad_filtros_mantenimiento
        ); */

        for ($i = 0; $i < count($array_sistemas); $i++) {
            if($array_sistemas[$i][0] == $id){
                $array_sistemas[$i][1] = $sistema;
                $array_sistemas[$i][2] = $unidad_aux;
                $array_sistemas[$i][3] = $marca->marca;
                $array_sistemas[$i][4] = $modelo->modelo;
                $array_sistemas[$i][5] = $request->values[5];  //capacidad_termica_mantenimiento;
                $array_sistemas[$i][6] = $request->values[6];  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][7] = $request->values[7];  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][8] =  strtoupper($acceso);  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][9] =  strtoupper($estado);  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][10] = $request->values[10].'_hidden';  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][11] = $request->values[11].'_hidden';  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][12] = $request->values[12].'_hidden';  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][13] = $request->values[13].'_hidden';  //cantidad_unidades_mantenimiento
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


             /* dd($capacidad_termica_mantenimiento.'_'.$cantidad_unidades_mantenimiento.'_'.$costo_instalado.'_'.$rav.'_'.$fa.'_'.$fta.'_'.$feu.'_'.$fav.'_'.$fhd); */
            // La petición es una petición AJAX
            return $res_formula_calculo;

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
             $rav_porcent = $rav/100;
             $res = $capacidad_termica_mantenimiento*$cantidad_unidades_mantenimiento*$costo_instalado*$rav_porcent*$fa*$fta*$feu*$fav*$fhd*$fg;

    return $res;
  }

  public function spend_plan_base(Request $request)
{



    $analisis_costo_mant_array = [];

    $array_speed_plan = [];

    // Obtener el array del request
    $data = $request->values;

    // Array para almacenar los valores que terminan en _0
    $filteredData = [];

    // Recorrer el array
    foreach ($data as $key => $value) {
        // Verificar si la clave contiene 'precio_' seguido de un número
        if (preg_match('/^precio_\d+$/', $key)) {
            // Agregar al array filtrado
            $filteredData[$key] = $value;
        }
    }

    $suma_precios = 0;

    for ($i=0; $i < count($filteredData) ; $i++) {
        $suma_precios = $suma_precios + $filteredData['precio_'.$i];
    }

    $format_suma_precios = '$'.number_format($suma_precios);

    $materiales_porcent =0.09;
    $equipos_porcent =0;
    $mano_obra_porcent = 0.25;
    $vehiculos_porcent =0.07;
    $contratistas_porcent =0;
    $viaticos_porcent =0;
    $burden_porcent = 0.19;
    $ga_porcent =0.12;
    $ventas_porcent =0.06;
    $financiamiento_porcent = 0.04;

    $materiales = $materiales_porcent * $suma_precios;
    $equipos = $equipos_porcent * $suma_precios;
    $mano_obra = $mano_obra_porcent * $suma_precios;
    $vehiculos = $vehiculos_porcent * $suma_precios;
    $contratistas = $contratistas_porcent * $suma_precios;
    $viaticos = $viaticos_porcent * $suma_precios;
    $burden = $burden_porcent * $suma_precios;


    $ga = $ga_porcent * $suma_precios;
    $ventas = $ventas_porcent * $suma_precios;
    $financiamiento = $financiamiento_porcent * $suma_precios;

    $results = [];
    $total = $materiales + $equipos + $mano_obra + $vehiculos + $contratistas + $viaticos + $burden;
    $total_porcent = $materiales_porcent + $equipos_porcent + $mano_obra_porcent + $vehiculos_porcent + $contratistas_porcent + $viaticos_porcent + $burden_porcent;

    $ganancia_porcent=1-$total_porcent-$ga_porcent-$ventas_porcent-$financiamiento_porcent;
    $ganancia = $ganancia_porcent * $suma_precios;
    array_push($results,$total,$total_porcent);

    //calculo manual de mano de obra
    $configuraciones = ConfiguracionesMantenimientoModel::where('id_empresa','=',Auth::user()->id_empresa)->get();


    //formula tiempo ppara mantenimiento

    //(mano_obra/valor_tecnico_ayudante)*0.72
    $valor_tecnico_ayudante = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $mano_obra_div_tecnico_ayudante = $mano_obra/$valor_tecnico_ayudante;
    $tiempo_mantenimiento = $mano_obra_div_tecnico_ayudante*0.72;

    // $dias_mantenimiento = */
    //tiempo_mantenimiento/(valor_horas_utiles-0.5)
    $valor_horas_utiles = ConfiguracionesMantenimientoModel::where('slug','=','horas-utiles-dia')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    //valor_horas_utiles-0.5
    $valor_horas_utiles_menos_05 = intval($valor_horas_utiles) - 0.5;
    //tiempo_mantenimiento/(valor_horas_utiles-0.5)
    $dias_mantenimiento = $tiempo_mantenimiento/$valor_horas_utiles_menos_05;


    //dias_mantenimiento*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    $valor_tiempos_traslados = ConfiguracionesMantenimientoModel::where('slug','=','horas-utiles-dia')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;

    $tiempo_traslados = $dias_mantenimiento*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

    //tiempo acceeso edificio
    $tiempo_acceso_edificio = $dias_mantenimiento;

    //tiempo_garantias
    //((mano_obra/valor_tecnico_ayudante)*0.28)-tiempo_traslados-tiempo_acceso_edificio
    $mano_obra_div_valor_mano_obra_tecnico = $mano_obra/$valor_tecnico_ayudante;
    $mult_mano_obra_div_valor_mano_obra_tecnico = $mano_obra_div_valor_mano_obra_tecnico*0.28;
    $tiempo_garantias = $mult_mano_obra_div_valor_mano_obra_tecnico-$tiempo_traslados-$tiempo_acceso_edificio;


    ///////////////////////calculo vehiculos
    $costo_teorico = $vehiculos;

    //cossto_pracrtico
    //dias_mantenimiento*$distancia_sitio_mantenimiento*valor_vehiculo
    $valor_vehiculo = ConfiguracionesMantenimientoModel::where('slug','=','valor-vehiculo')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $costo_practico = $dias_mantenimiento*$distancia_sitio_mantenimiento*$valor_vehiculo;

    //guardar en array_speed_plan

    array_push($array_speed_plan,$materiales,$equipos,$mano_obra,$vehiculos,$contratistas,$viaticos,$burden,$ga,$ventas,$financiamiento,$suma_precios);
    // Guardar el array actualizado en la sesión
    session(['array_speed_plan' => $array_speed_plan]);

    //ceil reondea a entero superior
    array_push($analisis_costo_mant_array,$format_suma_precios,ceil($dias_mantenimiento),ceil($tiempo_mantenimiento),ceil($tiempo_traslados),ceil($tiempo_acceso_edificio),ceil($tiempo_garantias));

    return response()->json($analisis_costo_mant_array);
}

public function spend_plan_base_adicionales(Request $request)
{



    $analisis_costo_mant_array = [];
    // Obtener array_sistemas de la sesión
    $array_speed_plan = Session::get('array_speed_plan');

    ///$paquete_refacciones_aux = explode('$',$request->values['paquete_refacciones_adicionales']);

    $paquete_refacciones = $this->precio_to_integer($request->values['paquete_refacciones_adicionales']);

    //$pruebas_especiales_aux = explode('$',$request->values['pruebas_especiales_adicionales']);
    $pruebas_especiales =  $this->precio_to_integer($request->values['pruebas_especiales_adicionales']);

    //$costos_costos_filtro_aire_adicionales_aux = explode('$',$request->values['costos_filtro_aire_adicionales']);
    $costos_costos_filtro_aire_adicionales_aux = $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);

    $mariales_adicionales =  intval($costos_costos_filtro_aire_adicionales_aux)+$paquete_refacciones+$pruebas_especiales;

    /* andamios_gruas_adicionales
    pruebas_especiales_adicionales */


    //$costos_filtro_aire_adicionales = $request->values['costos_filtro_aire_adicionales'];
    $servicio_emergencias_adicionales =  $request->values['servicio_emergencias_adicionales'];
    $tiempo_adicional_accesos_adicionales = $request->values['tiempo_adicional_accesos_adicionales'];
    $curso_seguridad_otros_adicionales = $request->values['curso_seguridad_otros_adicionales'];
    $lavado_filtros_aire_adicionales = $request->values['lavado_filtros_aire_adicionales'];
    $lavado_evaporadores_adicionales = $request->values['lavado_evaporadores_adicionales'];
    $lavado_extra_condensadores_adicionales = $request->values['lavado_extra_condensadores_adicionales'];
    $lavado_ventiladores_adicionales = $request->values['lavado_ventiladores_adicionales'];
    $limpieza_grasa_adicionales = $request->values['limpieza_grasa_adicionales'];
    $seguristas_supervicion_adicionales = $request->values['seguristas_supervicion_adicionales'];

    //$contratistas_adicionales_aux =  explode('$',$request->values['contratistas_adicionales']);
    $contratistas_adicionales = $this->precio_to_integer($request->values['contratistas_adicionales']);

    //$viaticos_adicionales_aux = explode('$',$request->values['viaticos_adicionales']);
    $viaticos_adicionales = $this->precio_to_integer($request->values['viaticos_adicionales']);

    $mo_tecnico_yudante = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $segurista_supervisor = ConfiguracionesMantenimientoModel::where('slug','=','segurista-supervisor')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $valor_burden = ConfiguracionesMantenimientoModel::where('slug','=','valor-burden')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $valor_horas_utiles = ConfiguracionesMantenimientoModel::where('slug','=','horas-utiles-dia')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $valor_mano_obra_tecnico = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    $valor_vehiculo = ConfiguracionesMantenimientoModel::where('slug','=','valor-vehiculo')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;

    $materiales = $array_speed_plan[0];
    $equipos = 0;
    $vehiculos = $array_speed_plan[3];
    $contratistas = $array_speed_plan[4];
    $viaticos = $array_speed_plan[5];
    $burden = $array_speed_plan[6];

    $ga =$array_speed_plan[7];
    $ventas =$array_speed_plan[8];
    $financiamiento =$array_speed_plan[9];

    //////////////////////materiales
    $materiales_sp_adicionales =  $materiales+$mariales_adicionales;

    ///////////////////equipos
    $equipos_sp_adicionales = $equipos;

    /////////////////////mano de obra adcionales

    //$array_speed_plan[2]+((servicio_emergencias_adicionales+tiempo_adicional_accesos_adicionales+curso_seguridad_otros_adicionales+lavado_filtros_aire_adicionales++lavado_evaporadores_adicionales+lavado_extra_condensadores_adicionales+lavado_ventiladores_adicionales+limpieza_grasa_adicionales)*mo_tecnico_yudante)+(M19*Configuraciones!H9)


    //$array_speed_plan[2]+((servicio_emergencias_adicionales+tiempo_adicional_accesos_adicionales+curso_seguridad_otros_adicionales+lavado_filtros_aire_adicionales++lavado_evaporadores_adicionales+lavado_extra_condensadores_adicionales+lavado_ventiladores_adicionales+limpieza_grasa_adicionales)
    $suma_ = $servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

    //suma*mo_tecnico_ayudante
    $suma_multi_mo_tecnico_yudante = $suma_*$mo_tecnico_yudante;

    //segurista_supervcion*$segurista_supervisor

    $seguristas__mult_segurista = $seguristas_supervicion_adicionales*$segurista_supervisor;

    //multi_mano_obra+($seguristas_supervicion_adicionales*$mano_obra =$array_speed_plan[2]
    $mano_de_obra_sp_adicionales = $array_speed_plan[2]+$suma_multi_mo_tecnico_yudante+$seguristas__mult_segurista;

    //////////////////////vehiculos
    $vehiculos_sp_adicionales = $vehiculos*1.2;

    //////////////////////contratistas
    //contratistas_adicionales+(seguristas_supervicion_adicionales*seguristas_supervicion)

    $seguristas_supervicion_adicionales_multi_seguristas_supervicion = $seguristas_supervicion_adicionales*$segurista_supervisor;

    $contratistas_sp_adicionales = $contratistas_adicionales+$seguristas_supervicion_adicionales_multi_seguristas_supervicion;

    //////////////////////viaticos
    $viaticos_sp_adicionales = $viaticos_adicionales;

     //////////////////////burden
     //$burden+((suma_burden)*valor_burden)

     $suma_burden =$servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

     //(suma_burden)*valor_burden)
     $suma_burden_multi_valor_burden = $suma_burden*$valor_burden;
     //$burden+((suma_burden)*valor_burden)
     $burden_sp_adicionales = $burden+$suma_burden_multi_valor_burden;


     $total = $materiales_sp_adicionales + $equipos + $mano_de_obra_sp_adicionales + $vehiculos_sp_adicionales + $contratistas_sp_adicionales + $viaticos_sp_adicionales + $burden_sp_adicionales;

     $precio_venta = 1*$total/0.6;
     $format_total_money = '$'.number_format($precio_venta);

    ////////////////////////////////////porcentajes
    //materiales_sp_adicionales*1/$total
    $materiales_sp_porcent =$materiales_sp_adicionales*1/$precio_venta;

    $equipos_sp_porcent = $equipos_sp_adicionales*1/$total;

    $mano_obra_sp_porcent = $mano_de_obra_sp_adicionales*1/$precio_venta;

    $vehiculos_sp_porcent = $vehiculos_sp_adicionales*1/$precio_venta;

    $contratistas_sp_porcent =  $contratistas_sp_adicionales*1/$precio_venta;

    $viaticos_sp_porcent = $viaticos_sp_adicionales*1/$precio_venta;

    $burden_sp_porcent = $burden_sp_adicionales*1/$precio_venta;

    $suma_sp_porcent = $materiales_sp_porcent+$equipos_sp_porcent+$mano_obra_sp_porcent+$vehiculos_sp_porcent+$contratistas_sp_porcent+$viaticos_sp_porcent+$burden_sp_porcent;

    $ga_sp_porcent =0.12;
    $ventas_sp_porcent =0.06;
    $financiamiento_sp_porcent = 0.04;

    //$ganancia_sp_porcent=1-$suma_sp_porcent-$ga_sp_porcent-$ventas_sp_porcent-$financiamiento_sp_porcent;
    $ga_sp = $ga_sp_porcent * $precio_venta;

    $ventas_sp = $ventas_sp_porcent * $precio_venta;

    $financiamiento_sp = $financiamiento_sp_porcent * $precio_venta;


    $ganancia_sp_porcent=1-$suma_sp_porcent-$ga_sp_porcent-$ventas_sp_porcent-$financiamiento_sp_porcent;

    $ganancia_sp = $precio_venta*$ganancia_sp_porcent;

    ////////////////////////tieempo de mantenimiento
    //(D7/Configuraciones!H5)*0.72
    $tiempo_mantenimiento_sp = $mano_de_obra_sp_adicionales/$mo_tecnico_yudante*0.72;

    //////////////////////dias de manteenimiento
    //tiempo_mantenimiento_sp/(valor_horas_utiles-0.5)

    $horas_utiles_menos_0_5 = $valor_horas_utiles-0.5;
    //tiempo_mantenimiento_sp/horas_utiles_menos_0_5
    $dias_mantenimiento_sp = $tiempo_mantenimiento_sp/$horas_utiles_menos_0_5;

    /////////////////////tiempo traslados
    //dias_mantenimiento_sp*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    $tiempo_traslados = $dias_mantenimiento_sp*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

    /////////////////////tiempo acceso edificio
    //dias_mantenimiento_sp + tiempo_adicional_accesos_adicionales
    $tiempo_acceso_edificio = $dias_mantenimiento_sp+$tiempo_adicional_accesos_adicionales;

    ///////////////////tiempo de garantias

    //((mano_de_obra_sp_adicionales/mo_tecnico_yudante)*0.28)-C25-C26
    //(mano_obra_sp_porcent/valor_mano_obra_tecnico)-tiempo_traslados-tiempo_acceso_edificio-tiempo_mantenimiento_sp
    $mano_obra_div_valor_mano_obra_tecnico = $mano_de_obra_sp_adicionales/$mo_tecnico_yudante;
    $mult_mano_obra_div_valor_mano_obra_tecnico = $mano_obra_div_valor_mano_obra_tecnico*0.28;

    $tiempo_garantias = $mult_mano_obra_div_valor_mano_obra_tecnico-$tiempo_traslados-$tiempo_acceso_edificio;

    //////////////////costo teeorico
    $costo_teorico = $vehiculos_sp_adicionales;

    //////////////////costo practico
    //dias_mantenimiento_sp*$distancia_sitio_mantenimiento*valor_vehiculo
    $costo_practico = $dias_mantenimiento_sp*$distancia_sitio_mantenimiento*$valor_vehiculo;

    //valores para grafica costos mantenimiento
    $id_unidad_aux = explode('_',$request->values['unidad_aux_mantenimiento_0']);
    $id_unidad = UnidadesModel::where('identificador','=',$id_unidad_aux[0])->first()->id;
    $costo_instalado = BaseCalculoModel::where('id_unidad','=',$id_unidad)->first()->costo_instalacion;
    $capacidad_termica =  $request->values['capacidad_termica_mantenimiento_0'];
    $cantidad_unidades_mantenimiento =  $request->values['cantidad_unidades_mantenimiento_0'];
    $arry_grafic = [];

    //obtiene el valor de grafica_costos_mantenimiento
    $arry_grafic = $this->grafica_costos_mantenimiento($cantidad_unidades_mantenimiento,$costo_instalado,$capacidad_termica,$precio_venta,$array_speed_plan[10]);

    //guardar en array_speed_plan
    array_push($analisis_costo_mant_array
    ,$format_total_money
    ,number_format($dias_mantenimiento_sp)
    ,number_format($tiempo_mantenimiento_sp)
    ,number_format($tiempo_traslados)
    ,number_format($tiempo_acceso_edificio)
    ,number_format($tiempo_garantias)
    ,number_format($materiales_sp_adicionales)
    ,number_format($equipos_sp_adicionales)
    ,number_format($mano_de_obra_sp_adicionales)
    ,number_format($vehiculos_sp_adicionales)
    ,number_format($contratistas_sp_adicionales)
    ,number_format($viaticos_sp_adicionales)
    ,number_format($burden_sp_adicionales)
    ,number_format($ga_sp)
    ,number_format($ventas_sp)
    ,number_format($financiamiento_sp)
    ,number_format($materiales_sp_porcent*100).'%'
    ,number_format($equipos_sp_porcent*100).'%'
    ,number_format($mano_obra_sp_porcent*100).'%'
    ,number_format($vehiculos_sp_porcent*100).'%'
    ,number_format($contratistas_sp_porcent*100).'%'
    ,number_format($viaticos_sp_porcent*100).'%'
    ,number_format($burden_sp_porcent*100).'%'
    ,number_format($ga_sp_porcent*100).'%'
    ,number_format($ventas_sp_porcent*100).'%'
    ,number_format($financiamiento_sp_porcent*100).'%'
    ,number_format($ganancia_sp_porcent*100).'%'
    ,number_format($ganancia_sp)
    ,$arry_grafic[0]
    ,$arry_grafic[1]
    ,$arry_grafic[2]
    ,$arry_grafic[3]
);

    return response()->json($analisis_costo_mant_array);
}

    public function spend_plan_base_adicionales_gp(Request $request, $porcent){

        $analisis_costo_mant_array = [];
        // Obtener array_sistemas de la sesión
       $array_speed_plan = Session::get('array_speed_plan');

       //$paquete_refacciones_aux = explode('$',$request->values['paquete_refacciones_adicionales']);
       $paquete_refacciones = $this->precio_to_integer($request->values['paquete_refacciones_adicionales']);

       //$pruebas_especiales_aux = explode('$',$request->values['pruebas_especiales_adicionales']);
       $pruebas_especiales = $this->precio_to_integer($request->values['pruebas_especiales_adicionales']);

       $costos_costos_filtro_aire_adicionales_aux = $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);

       $mariales_adicionales = intval($costos_costos_filtro_aire_adicionales_aux)+$paquete_refacciones+$pruebas_especiales;
       //$costos_filtro_aire_adicionales = $request->values['costos_filtro_aire_adicionales'];
       $servicio_emergencias_adicionales =  $request->values['servicio_emergencias_adicionales'];
       $tiempo_adicional_accesos_adicionales = $request->values['tiempo_adicional_accesos_adicionales'];
       $curso_seguridad_otros_adicionales = $request->values['curso_seguridad_otros_adicionales'];
       $lavado_filtros_aire_adicionales = $request->values['lavado_filtros_aire_adicionales'];
       $lavado_evaporadores_adicionales = $request->values['lavado_evaporadores_adicionales'];
       $lavado_extra_condensadores_adicionales = $request->values['lavado_extra_condensadores_adicionales'];
       $lavado_ventiladores_adicionales = $request->values['lavado_ventiladores_adicionales'];
       $limpieza_grasa_adicionales = $request->values['limpieza_grasa_adicionales'];
       $seguristas_supervicion_adicionales = $request->values['seguristas_supervicion_adicionales'];

       //$contratistas_adicionales_aux =  explode('$',$request->values['contratistas_adicionales']);
       $contratistas_adicionales = $this->precio_to_integer($request->values['contratistas_adicionales']);

       //$viaticos_adicionales_aux = explode('$',$request->values['viaticos_adicionales']);
       $viaticos_adicionales = $this->precio_to_integer($request->values['viaticos_adicionales']);

       $mo_tecnico_yudante = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
       $segurista_supervisor = ConfiguracionesMantenimientoModel::where('slug','=','segurista-supervisor')
       ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
       $valor_burden = ConfiguracionesMantenimientoModel::where('slug','=','valor-burden')
       ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
       $valor_horas_utiles = ConfiguracionesMantenimientoModel::where('slug','=','horas-utiles-dia')
       ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
       $valor_mano_obra_tecnico = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
       ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
       $valor_vehiculo = ConfiguracionesMantenimientoModel::where('slug','=','valor-vehiculo')
       ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;

       $materiales = $array_speed_plan[0];
       $equipos = 0;
       $vehiculos = $array_speed_plan[3];
       $contratistas = $array_speed_plan[4];
       $viaticos = $array_speed_plan[5];
       $burden = $array_speed_plan[6];

       $ga =$array_speed_plan[7];
       $ventas =$array_speed_plan[8];
       $financiamiento =$array_speed_plan[9];

       //////////////////////materiales
       $materiales_sp_adicionales =  $materiales+$mariales_adicionales;

       ///////////////////equipos
       $equipos_sp_adicionales = $equipos;

       /////////////////////mano de obra adcionales

       //$array_speed_plan[2]+((servicio_emergencias_adicionales+tiempo_adicional_accesos_adicionales+curso_seguridad_otros_adicionales+lavado_filtros_aire_adicionales++lavado_evaporadores_adicionales+lavado_extra_condensadores_adicionales+lavado_ventiladores_adicionales+limpieza_grasa_adicionales)*mo_tecnico_yudante)+(M19*Configuraciones!H9)


       //$array_speed_plan[2]+((servicio_emergencias_adicionales+tiempo_adicional_accesos_adicionales+curso_seguridad_otros_adicionales+lavado_filtros_aire_adicionales++lavado_evaporadores_adicionales+lavado_extra_condensadores_adicionales+lavado_ventiladores_adicionales+limpieza_grasa_adicionales)
       $suma_ = $servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

       //suma*mo_tecnico_ayudante
       $suma_multi_mo_tecnico_yudante = $suma_*$mo_tecnico_yudante;

       //segurista_supervcion*$segurista_supervisor

       $seguristas__mult_segurista = $seguristas_supervicion_adicionales*$segurista_supervisor;

       //multi_mano_obra+($seguristas_supervicion_adicionales*$mano_obra =$array_speed_plan[2]
       $mano_de_obra_sp_adicionales = $array_speed_plan[2]+$suma_multi_mo_tecnico_yudante+$seguristas__mult_segurista;

       //////////////////////vehiculos
       $vehiculos_sp_adicionales = $vehiculos*1.2;

       //////////////////////contratistas
       //contratistas_adicionales+(seguristas_supervicion_adicionales*seguristas_supervicion)

       $seguristas_supervicion_adicionales_multi_seguristas_supervicion = $seguristas_supervicion_adicionales*$segurista_supervisor;

       $contratistas_sp_adicionales = $contratistas_adicionales+$seguristas_supervicion_adicionales_multi_seguristas_supervicion;
       //////////////////////viaticos
       $viaticos_sp_adicionales = $viaticos_adicionales;

        //////////////////////burden
        //$burden+((suma_burden)*valor_burden)

        $suma_burden =$servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

        //(suma_burden)*valor_burden)
        $suma_burden_multi_valor_burden = $suma_burden*$valor_burden;
        //$burden+((suma_burden)*valor_burden)
        $burden_sp_adicionales = $burden+$suma_burden_multi_valor_burden;


        $total = $materiales_sp_adicionales + $equipos + $mano_de_obra_sp_adicionales + $vehiculos_sp_adicionales + $contratistas_sp_adicionales + $viaticos_sp_adicionales + $burden_sp_adicionales;


        //100%*total/(100%-porcent)
        //100%-porcent
        //pocent_mult
        $porcent_aux = $porcent/100;
        $porcent_menos = 1-$porcent_aux;
        //100%*total
        $mult_1_total =1*$total;
        $precio_venta = $mult_1_total/$porcent_menos;
        $format_total_money = '$'.number_format($precio_venta);

       ////////////////////////////////////porcentajes
       //materiales_sp_adicionales*1/$total
       $materiales_sp_porcent =$materiales_sp_adicionales*1/$precio_venta;

       $equipos_sp_porcent = $equipos_sp_adicionales*1/$total;

       $mano_obra_sp_porcent = $mano_de_obra_sp_adicionales*1/$precio_venta;

       $vehiculos_sp_porcent = $vehiculos_sp_adicionales*1/$precio_venta;

       $contratistas_sp_porcent =  $contratistas_sp_adicionales*1/$precio_venta;

       $viaticos_sp_porcent = $viaticos_sp_adicionales*1/$precio_venta;

       $burden_sp_porcent = $burden_sp_adicionales*1/$precio_venta;

       $suma_sp_porcent = $materiales_sp_porcent+$equipos_sp_porcent+$mano_obra_sp_porcent+$vehiculos_sp_porcent+$contratistas_sp_porcent+$viaticos_sp_porcent+$burden_sp_porcent;

       $ga_sp_porcent =0.12;
       $ventas_sp_porcent =0.06;
       $financiamiento_sp_porcent = 0.04;

       //$ganancia_sp_porcent=1-$suma_sp_porcent-$ga_sp_porcent-$ventas_sp_porcent-$financiamiento_sp_porcent;
       $ga_sp = $ga_sp_porcent * $precio_venta;

       $ventas_sp = $ventas_sp_porcent * $precio_venta;

       $financiamiento_sp = $financiamiento_sp_porcent * $precio_venta;


       $ganancia_sp_porcent=1-$suma_sp_porcent-$ga_sp_porcent-$ventas_sp_porcent-$financiamiento_sp_porcent;

       $ganancia_sp = $precio_venta*$ganancia_sp_porcent;

       ////////////////////////tieempo de mantenimiento
       //(D7/Configuraciones!H5)*0.65
       $tiempo_mantenimiento_sp = $mano_de_obra_sp_adicionales/$mo_tecnico_yudante*0.65;

       //////////////////////dias de manteenimiento
       //tiempo_mantenimiento_sp/(valor_horas_utiles-0.5)

       $horas_utiles_menos_0_5 = $valor_horas_utiles-0.5;
       //tiempo_mantenimiento_sp/horas_utiles_menos_0_5
       $dias_mantenimiento_sp = $tiempo_mantenimiento_sp/$horas_utiles_menos_0_5;

       /////////////////////tiempo traslados
       //dias_mantenimiento_sp*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
       $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
       $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
       $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

       $tiempo_traslados = $dias_mantenimiento_sp*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

       /////////////////////tiempo acceso edificio
       //dias_mantenimiento_sp + tiempo_adicional_accesos_adicionales
       $tiempo_acceso_edificio = $dias_mantenimiento_sp+$tiempo_adicional_accesos_adicionales;

       ///////////////////tiempo de garantias
       //(mano_obra_sp_porcent/valor_mano_obra_tecnico)-tiempo_traslados-tiempo_acceso_edificio-tiempo_mantenimiento_sp
       $mano_obra_div_valor_mano_obra_tecnico = $mano_de_obra_sp_adicionales/$valor_mano_obra_tecnico;

       $tiempo_garantias = $mano_obra_div_valor_mano_obra_tecnico-$tiempo_traslados-$tiempo_acceso_edificio-$tiempo_mantenimiento_sp;


       //////////////////costo teeorico
       $costo_teorico = $vehiculos_sp_adicionales;

       //////////////////costo practico
       //dias_mantenimiento_sp*$distancia_sitio_mantenimiento*valor_vehiculo
       $costo_practico = $dias_mantenimiento_sp*$distancia_sitio_mantenimiento*$valor_vehiculo;

       array_push($analisis_costo_mant_array
       ,$format_total_money
       ,number_format($dias_mantenimiento_sp)
       ,number_format($tiempo_mantenimiento_sp)
       ,number_format($tiempo_traslados)
       ,number_format($tiempo_acceso_edificio)
       ,number_format($tiempo_garantias)
       ,number_format($materiales_sp_adicionales)
       ,number_format($equipos_sp_adicionales)
       ,number_format($mano_de_obra_sp_adicionales)
       ,number_format($vehiculos_sp_adicionales)
       ,number_format($contratistas_sp_adicionales)
       ,number_format($viaticos_sp_adicionales)
       ,number_format($burden_sp_adicionales)
       ,number_format($ga_sp)
       ,number_format($ventas_sp)
       ,number_format($financiamiento_sp)
       ,number_format($materiales_sp_porcent*100).'%'
       ,number_format($equipos_sp_porcent*100).'%'
       ,number_format($mano_obra_sp_porcent*100).'%'
       ,number_format($vehiculos_sp_porcent*100).'%'
       ,number_format($contratistas_sp_porcent*100).'%'
       ,number_format($viaticos_sp_porcent*100).'%'
       ,number_format($burden_sp_porcent*100).'%'
       ,number_format($ga_sp_porcent*100).'%'
       ,number_format($ventas_sp_porcent*100).'%'
       ,number_format($financiamiento_sp_porcent*100).'%'
       ,number_format($ganancia_sp_porcent*100).'%'
       ,number_format($ganancia_sp)
   );

       return response()->json($analisis_costo_mant_array);
    }

    public function grafica_costos_mantenimiento($cantidad_unidades_mantenimiento,$costo_instalado,         $capacidad_termica,$precio_venta,$suma_precios){

        $arry_grafica_costos_mantenimiento = [];
        $costo_equipamiento_instalado = $cantidad_unidades_mantenimiento*$costo_instalado*$capacidad_termica;
        $rav_minimo = 0.03 * $costo_equipamiento_instalado;
        $rav_maximo = 0.06 * $costo_equipamiento_instalado;
        $base = $suma_precios;
        $c_adicionales = $precio_venta;
        array_push($arry_grafica_costos_mantenimiento,$rav_minimo,$rav_maximo,$base,$c_adicionales);
        return $arry_grafica_costos_mantenimiento;
    }

    public function precio_to_integer($precio){
        $aux = explode("$",   $precio);

        if(count($aux) == 2){
            $precio = $aux[1];


            $aux_comillas= explode(",", $precio);

            if(count($aux_comillas) == 1){
                $precio_entero = $precio;
            }else if(count($aux_comillas)==2){
                $precio_entero = $aux_comillas[0].$aux_comillas[1];
            }else if(count($aux_comillas)==3){
                $precio_entero = $aux_comillas[0].$aux_comillas[1].$aux_comillas[2];
            }else if(count($aux_comillas)==4){
                $precio_entero = $aux_comillas[0].$aux_comillas[1].$aux_comillas[2].$aux_comillas[3];
            }

        }else if(count($aux)==1){
            $precio_entero =  $precio;
        }
        return $precio_entero;
    }

    public function check_counter_storage(){
        $array_sistemas = Session::get('array_sistemas');
        return count($array_sistemas);
    }

    public function reset_local_storage(){
        Session::forget('array_sistemas');
        Session::forget('array_speed_plan');
    }

}

