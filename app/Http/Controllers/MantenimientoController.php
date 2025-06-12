<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
use App\MantenimientoEquiposModel;
use App\Services\CalculoMantenimientoService;
use Illuminate\Support\Facades\Redirect;
use App\SistemasModel;
use App\ProjectsModel;
use App\UnidadesTrModel;
use App\UnidadesCfmModel;
use App\UnidadesUnidadModel;
use App\Traits\FormusTrait;
use App\MantenimientoProjectsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MantenimientoController extends Controller
{

    use FormusTrait;

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

    public function coordinacion_mantenimiento(){
        return view('mantenimiento.coordinacion_mantenimiento');
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

        $array_to_coordinacion = [];


            $sistema = $request->values[1];
            $unidad = $request->values[2];
            $capacidad_termica_mantenimiento = $request->values[5];
            $cantidad_unidades_mantenimiento = $request->values[6];
            $yrs_vida_mantenimiento = $request->values[7];
            $tipo_acceso_mantenimiento = $request->values[8];
            $estado_unidad_mantenimiento = $request->values[9];
            $cambio_filtros_mantenimiento = $request->values[11];
            $tipo_ambiente_mantenimiento = $request->values[16];
            $ocupacion_semanal_mantenimiento = $request->values[17];

            $horas = $this->horas($capacidad_termica_mantenimiento,$unidad);
            $periodo = $this->periodo($capacidad_termica_mantenimiento,$unidad);

            $fg = 1.03;
            //$costo_instalado = $this->obtener_costo_instalado($unidad);
            //$rav = $this->obtener_rav($unidad);
            $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
            $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
            $feu = $this->obtener_feu($estado_unidad_mantenimiento);
            $fav = $this->obtener_fav($yrs_vida_mantenimiento);
            $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);
            //$res_formula_calculo = $this->formula_calculo(intval($capacidad_termica_mantenimiento),intval($cantidad_unidades_mantenimiento),$costo_instalado,$rav,$fa,$fta,$feu,$fav,$fhd,$fg);
            $total_horas = $this->formula_total_horas(intval($horas),intval($cantidad_unidades_mantenimiento),$fa,$fta,$feu,$fav,$fhd,$fg);



        $sistemas = [
                    '1' => 'Paquetes (RTU)',
                    '2' => 'Split DX',
                    '16' => 'VRF / VRV',
                    '5' => 'PTAC/VTAC',
                    '6' => 'WSHP',
                    '7' => 'Minisplit Inverter',
                    '8' => 'Unidades Presición',
                    '9' => 'Chiller Scroll',
                    '10' => 'Chiller Scroll',
                    '11' => 'Chiller Turbocor',
                    '12' => 'Equipamiento Agua Fría',
                    '13' => 'Torres de Enfriamiento',
                    '14' => 'Ventilación',
                    '15' => 'Accesorios',
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
        $costo_cambio_filtros_aux = $this->precio_to_integer($request->values[12]);
        $suma_adicionales = $costo_cambio_filtros_aux * $request->values[13] * $request->values[6];

        //coordinacion resultados
        $hora_dia_aux = $this->div_horas_periodo($total_horas,$periodo);
        $hora_dia = $this->total_horas_periodo($hora_dia_aux,$periodo);
        $dias_aux =$hora_dia_aux/7;
        $dias = $this->redondeo_dias($dias_aux);
        $dias_ajustados = $this->total_dias_periodo($dias,$periodo);
        $idas_ajustados = $this->total_idas_periodo($dias,$periodo);

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
            $request->values[10].'_hidden',//horas_diarias_mantenimiento
            $request->values[11].'_hidden',//cambio_filtros_mantenimiento
            $request->values[12].'_hidden',//costo_filtro_mantenimiento
            $request->values[13].'_hidden',//cantidad_filtros_mantenimiento
            $unidad.'_hidden',
            $suma_adicionales.'_hidden',
            ''.'_hidden',
            ''.'_hidden',
            $total_horas.'_hidden',
            number_format($hora_dia,1).'_hidden',
            floatval(number_format($dias_ajustados,1)).'_hidden',
            $idas_ajustados.'_hidden',
        );


        ///////////////array_sistemas/////////////////////
        // Obtener el contenido actual de array_sistemas de la sesión
        $array_sistemas = Session::get('array_sistemas', []);

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
                ->where('equipo','=',$id_sistema)
                ->first()->id;
                $modelo = ModelosEmpresaModel::where('modelo','=',$array_sistemas[$i][4])
                ->where('id_empresa','=',Auth::user()->id_empresa)
                ->where('id_marca','=',$marca)
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

                /* $costo_cambio_filtros_aux = explode('$',$request->values[12]);
                $suma_adicionales = $costo_cambio_filtros_aux[1] * $request->values[13] * $request->values[6]; */

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

            $sistema = $request->values[1];
            $unidad = $request->values[2];
            $capacidad_termica_mantenimiento = $request->values[5];
            $cantidad_unidades_mantenimiento = $request->values[6];
            $yrs_vida_mantenimiento = $request->values[7];
            $tipo_acceso_mantenimiento = $request->values[8];
            $estado_unidad_mantenimiento = $request->values[9];
            $cambio_filtros_mantenimiento = $request->values[11];
            $tipo_ambiente_mantenimiento = $request->values[16];
            $ocupacion_semanal_mantenimiento = $request->values[17];

            $horas = $this->horas($capacidad_termica_mantenimiento,$unidad);
            $periodo = $this->periodo($capacidad_termica_mantenimiento,$unidad);
            $fg = 1.03;
            //$costo_instalado = $this->obtener_costo_instalado($unidad);
            //$rav = $this->obtener_rav($unidad);
            $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
            $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
            $feu = $this->obtener_feu($estado_unidad_mantenimiento);
            $fav = $this->obtener_fav($yrs_vida_mantenimiento);
            $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);
            $total_horas = $this->formula_total_horas(intval($horas),intval($cantidad_unidades_mantenimiento),$fa,$fta,$feu,$fav,$fhd,$fg);


        $sistemas = [
            '1' => 'Paquetes (RTU)',
            '2' => 'Split DX',
            '16' => 'VRF / VRV',
            '5' => 'PTAC/VTAC',
            '6' => 'WSHP',
            '7' => 'Minisplit Inverter',
            '8' => 'Unidades Presición',
            '9' => 'Chiller Scroll',
            '10' => 'Chiller Scroll',
            '11' => 'Chiller Turbocor',
            '12' => 'Equipamiento Agua Fría',
            '13' => 'Torres de Enfriamiento',
            '14' => 'Ventilación',
            '15' => 'Accesorios',
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

        $costo_cambio_filtros_aux = explode('$',$request->values[12]);
        $suma_adicionales = $costo_cambio_filtros_aux[1] * $request->values[13] * $request->values[6];

        $hora_dia_aux = $this->div_horas_periodo($total_horas,$periodo);
        $hora_dia = $this->total_horas_periodo($hora_dia_aux,$periodo);
        $dias_aux =$hora_dia_aux/7;
        $dias = $this->redondeo_dias($dias_aux);
        $dias_ajustados = $this->total_dias_periodo($dias,$periodo);
        $idas_ajustados = $this->total_idas_periodo($dias,$periodo);





        for ($i = 0; $i < count($array_sistemas); $i++) {
            if($array_sistemas[$i][0] == $id){
                $array_sistemas[$i][1] = $sistema;
                $array_sistemas[$i][2] = $unidad_aux;
                $array_sistemas[$i][3] = $marca->marca;
                $array_sistemas[$i][4] = $modelo->modelo;
                $array_sistemas[$i][5] = $request->values[5];  //cantidad_unidades_mantenimiento;
                $array_sistemas[$i][6] = $request->values[6];  //cantidad_unidades_mantenimiento
                $array_sistemas[$i][7] = $request->values[7];  //yrs_vida_mantenimiento
                $array_sistemas[$i][8] =  strtoupper($acceso);  //tipo_acceso_mantenimiento
                $array_sistemas[$i][9] =  strtoupper($estado);  //estado_unidad_mantenimiento
                $array_sistemas[$i][10] = $request->values[10].'_hidden';  //horas_diarias_mantenimiento
                $array_sistemas[$i][11] = $request->values[11].'_hidden';  //cambio_filtros_mantenimiento
                $array_sistemas[$i][12] = $request->values[12].'_hidden';  //costo_filtro_mantenimiento
                $array_sistemas[$i][13] = $request->values[13].'_hidden';  //cantidad_filtros_mantenimiento
                $array_sistemas[$i][14] = $unidad.'_hidden';  //unidad_aux
                $array_sistemas[$i][15] = $suma_adicionales.'_hidden';  //costo_suma
                $array_sistemas[$i][16] = ''.'_hidden';  //costo_suma
                $array_sistemas[$i][17] = ''.'_hidden';  //costo_suma
                $array_sistemas[$i][18] = $total_horas.'_hidden';  //costo_suma
                $array_sistemas[$i][19] = number_format($hora_dia,1).'_hidden';
                $array_sistemas[$i][20] = floatval(number_format($dias_ajustados,1)).'_hidden';
                $array_sistemas[$i][21] = $idas_ajustados.'_hidden';
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
            //$costo_instalado = $this->obtener_costo_instalado($unidad);
            //$rav = $this->obtener_rav($unidad);
            $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
            $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
            $feu = $this->obtener_feu($estado_unidad_mantenimiento);
            $fav = $this->obtener_fav($yrs_vida_mantenimiento);
            $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);
            $total_horas = $this->formula_total_horas(intval($cantidad_unidades_mantenimiento),$fa,$fta,$feu,$fav,$fhd,$fg);

             /* dd($capacidad_termica_mantenimiento.'_'.$cantidad_unidades_mantenimiento.'_'.$costo_instalado.'_'.$rav.'_'.$fa.'_'.$fta.'_'.$feu.'_'.$fav.'_'.$fhd); */
            // La petición es una petición AJAX
            return $total_horas;

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
                return -0.05;
            break;

            case '168':
                return 0.8;
            break;

            case '51_167':
                return 0;
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

  public function formula_total_horas($horas,$cantidad_unidades_mantenimiento,$fa,$fta,$feu,$fav,$fhd,$fg){


    //((Horas) + (Horas x FA) + (Horas x FHD) + (Horas x FEU)) x  FVA x FTA x Cantidad de Equipos
    //(Horas) + (Horas x FA) + (Horas x FHD) + (Horas x FEU)
    $suma_horas = $horas + ($horas*$fa) + ($horas*$fhd) + ($horas*$feu);
    $suma_mult_fva_fta_cantidad_equipos = $suma_horas*$fav*$fta*$cantidad_unidades_mantenimiento;
    $res =number_format($suma_mult_fva_fta_cantidad_equipos,1);
return $res;
}

  public function spend_plan_base(Request $request)
{


    $analisis_costo_mant_array = [];

    $array_speed_plan = [];

    // Obtener el array del request
    $data = $request->values;



    ////////////////////suma adicionalles//////////////////////
    /////sumar los costos//////////////////////////
$suma_costos = 0;
// Recorrer el array
foreach ($data as $key => $value) {
    // Verificar si la clave contiene 'costo_adicionales_aux_mantenimiento_' seguido de un número
    if (preg_match('/^costo_adicionales_aux_mantenimiento_\d+$/', $key)) {
        // Agregar al array filtrado
        $filteredData_costos[$key] = $value;
    }
}

for ($i=0; $i < count($filteredData_costos) ; $i++) {
    $costo_aux = explode('_hidden',$filteredData_costos['costo_adicionales_aux_mantenimiento_'.$i]);

    $suma_costos = $suma_costos + $costo_aux[0];
}
  $format_suma_costos = '$'.number_format($suma_costos);
/////////////////////////////////////////////////////

    //horas
        //horas_hombre
        $filtered_horas_hombre = [];
        $suma_horas_hombre = 0;
        // Recorrer el array
        foreach ($data as $key => $value) {
            // Verificar si la clave contiene 'total_horas_' seguido de un número
            if (preg_match('/^total_horas_\d+$/', $key)) {
                // Agregar al array filtrado
                $filtered_horas_hombre[$key] = $value;
            }
        }

        for ($i=0; $i < count($filtered_horas_hombre) ; $i++) {

            $suma_horas_aux = explode('_hidden',$filtered_horas_hombre['total_horas_'.$i]);

            //$suma_costos = $suma_costos + $precio_aux[0];
            $suma_horas_hombre = $suma_horas_hombre + $suma_horas_aux[0];
        }

        //dias
        $filtered_dias = [];
        $suma_dias = 0;
        // Recorrer el array
        foreach ($data as $key => $value) {
            // Verificar si la clave contiene 'dias_ajustados_' seguido de un número
            if (preg_match('/^dias_ajustados_\d+$/', $key)) {
                // Agregar al array filtrado
                $filtered_dias[$key] = $value;
            }
        }

        for ($i=0; $i < count($filtered_dias) ; $i++) {

            $suma_dias_aux = explode('_hidden',$filtered_dias['dias_ajustados_'.$i]);

            //$suma_costos = $suma_costos + $precio_aux[0];
            $suma_dias = intval($suma_dias) + intval($suma_dias_aux[0]);
        }

        //idas
        $filtered_idas = [];
        $suma_idas = 0;
        // Recorrer el array
        foreach ($data as $key => $value) {
            // Verificar si la clave contiene 'idas_ajustados_' seguido de un número
            if (preg_match('/^idas_ajustados_\d+$/', $key)) {
                // Agregar al array filtrado
                $filtered_idas[$key] = $value;
            }
        }

        for ($i=0; $i < count($filtered_idas) ; $i++) {

            $suma_idas_aux = explode('_hidden',$filtered_idas['idas_ajustados_'.$i]);

            //$suma_costos = $suma_costos + $precio_aux[0];
            $suma_idas = intval($suma_idas) + intval($suma_idas_aux[0]);
        }

    ///////////////////////

    //horas hombre mantenimiento
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $temnico_tecnico_ayudante = 1;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $temnico_tecnico_ayudante = 1.3;
    }

    $horas_hombre_mantenimiento_aux= $suma_horas_hombre / $temnico_tecnico_ayudante;
    $horas_hombre_mantenimiento = ceil($horas_hombre_mantenimiento_aux);

    //horass_hombres_ingresos_eegresos
    $horas_hombre_ingresos_egresos = $suma_idas * 2;


    //horas_hobres_traslados
    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    //$suma_idas * 2*'distancia_sitio_mantenimiento/'velocidad_promedio_mantenimiento
    $horas_hombre_traslados = ($suma_idas * 2 * $distancia_sitio_mantenimiento) / $velocidad_promedio_mantenimiento;



    //horas_hombres_garanti a
    $horas_hombre_garantia_aux = $horas_hombre_mantenimiento * 0.15;
    $horas_hombre_garantia = $horas_hombre_garantia_aux;


    //total horas
    $total_horas = $horas_hombre_mantenimiento + $horas_hombre_ingresos_egresos + $horas_hombre_traslados + $horas_hombre_garantia;

    /////////Mano de Obra/////////////////////////////////////////////
    //// formula: total_horas * personal_enviado_mantenimiento ///////////////////////

    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }

    $mano_obra_aux = $total_horas * $personal_enviado;
    $mano_obra = ceil($mano_obra_aux);


    ////////////Materiales/////////////////////////////////////////////
    ////formula: $mano_obra / 6
    $materiales_aux = $mano_obra / 6;
    $materiales = ceil($materiales_aux);

    ////////////Equipos/////////////////////////////////////////////
    $equipos = 0;

    ////////////Vehiculos/////////////////////////////////////////////
    /////formula: $distancia_sitio_mantenimiento*2*$suma_idas*1.2
    $vehiculos = $distancia_sitio_mantenimiento * 2 * $suma_idas * 1.2;


    ////////////Contratistas/////////////////////////////////////////////
    $contratistas = 0;

    ////////////Viaticos/////////////////////////////////////////////
    $viaticos = 0;

    ////////////Burden/////////////////////////////////////////////
    ////formula: $total_horas * valor_burden

    $valor_burden = ConfiguracionesMantenimientoModel::where('slug','=','valor-burden')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;

    $burden = $total_horas * $valor_burden;

    ///suma_precios
    $suma_precios = intval($materiales) + intval($equipos) + intval($mano_obra) + intval($vehiculos) + intval($contratistas) + intval($viaticos) + intval($burden);
    ///////////precio venta
    ///formula:$suma_precios*1/(100-40)
    $porcent_100_40_aux =  100-40;
    $porcent_100_40 = $porcent_100_40_aux/100;
    $precio_venta_aux = $suma_precios * 1 / $porcent_100_40;
    $precio_venta = intval($precio_venta_aux);


    //////////////Pocentajes/////////////////////////////////////////////

    //////////materiales porcent
    ///formula: $materiales*1/precio_venta
    $materiales_porcent_aux =$materiales*1/$precio_venta*100;
    $materiales_porcent = intval($materiales_porcent_aux);

    //////////equipos porcent
    ///formula: equipos*1/precio_venta
    $equipos_porcent_aux =$equipos*1/$precio_venta*100;
    $equipos_porcent = intval($equipos_porcent_aux);

    //////////mano de obra porcent
    ///formula: $mano_obra*1/precio_venta
    $mano_obra_porcent_aux =$mano_obra*1/$precio_venta*100;
    $mano_obra_porcent = intval($mano_obra_porcent_aux);

    //////////vehiculos porcent
    ///formula: $vehiculos*1/precio_venta
    $vehiculos_porcent_aux =$vehiculos*1/$precio_venta*100;
    $vehiculos_porcent = intval($vehiculos_porcent_aux);

    //////////contratistas porcent
    ///formula: $contratistas*1/precio_venta
    $contratistas_porcent_aux =$contratistas*1/$precio_venta*100;
    $contratistas_porcent = intval($contratistas_porcent_aux);

    //////////viaticos porcent
    ///formula: $viaticos*1/precio_venta
    $viaticos_porcent_aux =$viaticos*1/$precio_venta*100;
    $viaticos_porcent = intval($viaticos_porcent_aux);

    //////////burden porcent
    ///formula: $burden*1/precio_venta
    $burden_porcent_aux =$burden*1/$precio_venta*100;
    $burden_porcent = intval($burden_porcent_aux);

    $total_porcent = $materiales_porcent + $equipos_porcent + $mano_obra_porcent + $vehiculos_porcent + $contratistas_porcent + $viaticos_porcent + $burden_porcent;

    //////////ganancia porcent
    $ga_porcent =0.12;

    /////////ventas porcent
    $ventas_porcent =0.06;

    //////////financiamiento porcent
    $financiamiento_porcent = 0.04;

    //dd($precio_venta);
    //dd(intval($materiales).'_'.intval($equipos).'_'.intval($mano_obra).'_'.intval($vehiculos).'_'.intval($contratistas).'_'.intval($viaticos).'_'.intval($burden).'_'.intval($suma_precios));


    /////////////////GA
    /////formula: $ga_porcent * $precio_venta
    $ga_aux = $ga_porcent * $precio_venta;
    $ga = ceil($ga_aux);

    ////////////ventas
    ///formula: $ventas_porcent * $precio_venta
    $ventas_aux = $ventas_porcent * $precio_venta;
    $ventas = ceil($ventas_aux);
    ////////////financiamiento
    ////formula: $financiamiento_porcent * $precio_venta
    $financiamiento_aux = $financiamiento_porcent * $precio_venta;
    $financiamiento = ceil($financiamiento_aux);

    ////////////ganancia_porcent
    //////formula: 1-$total_porcent-$ga_porcent-$ventas_porcent-$financiamiento_porcent
    $total_porcent_porcent = $total_porcent/100;
    $ganancia_porcent_aux=1-$total_porcent_porcent-$ga_porcent-$ventas_porcent-$financiamiento_porcent;
    $ganancia_porcent = intval($ganancia_porcent_aux*100);

    ///////////Ganancia
    ///formula: $precio_venta * $ganancia_porcent
    $ganancia = $precio_venta * $ganancia_porcent/100;



    ////////////////////////Calculo anual de mano de obra

    //////////Dias mantenimiento
     $dias_mantenimiento = $suma_idas;

    //////////tiempo mantenimiento
    $tiempo_mantenimiento = $horas_hombre_mantenimiento;

    //////////tiempo traslados
    $tiempo_traslados = $horas_hombre_traslados;

    //////////tiempo acceso edificio
    $tiempo_acceso_edificio = $horas_hombre_ingresos_egresos;

    //////////tiempo garantias
    $tiempo_garantias = $horas_hombre_garantia;

    $format_precio_venta = '$'.number_format($precio_venta);

    //total_horas///////////
    $total_horas = $horas_hombre_mantenimiento + $horas_hombre_ingresos_egresos + $horas_hombre_traslados + $horas_hombre_garantia;

    //guardar en array_speed_plan

    array_push($array_speed_plan,$materiales,$equipos,$mano_obra,$vehiculos,$contratistas,$viaticos,$burden,$ga,$ventas,$financiamiento,$suma_precios,$total_horas,$tiempo_mantenimiento,$tiempo_garantias,$precio_venta);
    // Guardar el array actualizado en la sesión
    session(['array_speed_plan' => $array_speed_plan]);

    //ceil reondea a entero superior
   $id_new_project = $this->save_mantenimiento_project($request);

   array_push($analisis_costo_mant_array,$format_precio_venta,ceil($dias_mantenimiento),ceil($tiempo_mantenimiento),ceil($tiempo_traslados),ceil($tiempo_acceso_edificio),ceil($tiempo_garantias),$format_suma_costos,$id_new_project);


    return response()->json($analisis_costo_mant_array);
}

public function spend_plan_base_edit(Request $request,$id_project)
{

    $analisis_costo_mant_array = [];

    $array_speed_plan = [];

    $suma_total_horas = 0;

    $suma_costos = 0;

    $suma_horas_hombre = 0;

    $suma_idas = 0;

    $suma_dias = 0;

    $costos =  MantenimientoEquiposModel::where('id_project','=',$id_project)
    ->select('hora_dia','dias','idas_ajustados','total_horas','costo_total_filtros')
    ->get();

    foreach ($costos as $total_horas) {
        $suma_total_horas = $suma_total_horas + $total_horas->total_horas;
    }

    foreach ($costos as $costo) {
        $suma_costos = $suma_costos + $costo->costo_total_filtros;
    }

    foreach ($costos as $suma_hora) {
        $suma_horas_hombre = $suma_horas_hombre + $suma_hora->hora_dia;
    }

    foreach ($costos as $suma_ida) {
        $suma_idas = $suma_idas + $suma_ida->idas_ajustados;
    }

    foreach ($costos as $suma_dia) {
        $suma_dias = $suma_dias + $suma_dia->dias;
    }




    $format_suma_costos = '$'.number_format($suma_costos);


    //horas hombre mantenimiento
    //formula: 7*suma_dias/temnico_tecnico_ayudante
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $temnico_tecnico_ayudante = 1;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $temnico_tecnico_ayudante = 1.3;
    }

    $horas_hombre_mantenimiento_aux = 7*$suma_dias/$temnico_tecnico_ayudante;
    $horas_hombre_mantenimiento = ceil($horas_hombre_mantenimiento_aux);


    //horass_hombres_ingresos_eegresos
    $horas_hombre_ingresos_egresos = $suma_idas * 2;


    //horas_hobres_traslados
    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    //$suma_idas * 2*'distancia_sitio_mantenimiento/'velocidad_promedio_mantenimiento
    $horas_hombre_traslados = ($suma_idas * 2 * $distancia_sitio_mantenimiento) / $velocidad_promedio_mantenimiento;



    //horas_hombres_garanti a
    $horas_hombre_garantia = $horas_hombre_mantenimiento * 0.15;


    //total horas
    $total_horas = $horas_hombre_mantenimiento + $horas_hombre_ingresos_egresos + $horas_hombre_traslados + $horas_hombre_garantia;

    /////////Mano de Obra/////////////////////////////////////////////
    //// formula: total_horas * personal_enviado_mantenimiento ///////////////////////

    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }

    $mano_obra_aux = $total_horas * $personal_enviado;
    $mano_obra = ceil($mano_obra_aux);

    ////////////Materiales/////////////////////////////////////////////
    ////formula: $mano_obra / 6
    $materiales_aux = $mano_obra / 6;
    $materiales = ceil($materiales_aux);

    ////////////Equipos/////////////////////////////////////////////
    $equipos = 0;

    ////////////Vehiculos/////////////////////////////////////////////
    /////formula: $distancia_sitio_mantenimiento*2*$suma_idas*1.2
    $vehiculos = $distancia_sitio_mantenimiento * 2 * $suma_dias * 1.2;


    ////////////Contratistas/////////////////////////////////////////////
    $contratistas = 0;

    ////////////Viaticos/////////////////////////////////////////////
    $viaticos = 0;

    ////////////Burden/////////////////////////////////////////////
    ////formula: $total_horas * valor_burden

    $valor_burden = ConfiguracionesMantenimientoModel::where('slug','=','valor-burden')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;

    $burden = $total_horas * $valor_burden;


    ///suma_precios
    $suma_precios = intval($materiales) + intval($equipos) + intval($mano_obra) + intval($vehiculos) + intval($contratistas) + intval($viaticos) + intval($burden);

    ///////////precio venta
    ///formula:$suma_precios*1/(100-40)
    $porcent_100_40_aux =  100-40;
    $porcent_100_40 = $porcent_100_40_aux/100;
    $precio_venta_aux = $suma_precios * 1 / $porcent_100_40;
    $precio_venta = intval($precio_venta_aux);


    //////////////Pocentajes/////////////////////////////////////////////

    //////////materiales porcent
    ///formula: $materiales*1/precio_venta
    $materiales_porcent_aux =$materiales*1/$precio_venta*100;
    $materiales_porcent = intval($materiales_porcent_aux);

    //////////equipos porcent
    ///formula: equipos*1/precio_venta
    $equipos_porcent_aux =$equipos*1/$precio_venta*100;
    $equipos_porcent = intval($equipos_porcent_aux);

    //////////mano de obra porcent
    ///formula: $mano_obra*1/precio_venta
    $mano_obra_porcent_aux =$mano_obra*1/$precio_venta*100;
    $mano_obra_porcent = intval($mano_obra_porcent_aux);

    //////////vehiculos porcent
    ///formula: $vehiculos*1/precio_venta
    $vehiculos_porcent_aux =$vehiculos*1/$precio_venta*100;
    $vehiculos_porcent = intval($vehiculos_porcent_aux);

    //////////contratistas porcent
    ///formula: $contratistas*1/precio_venta
    $contratistas_porcent_aux =$contratistas*1/$precio_venta*100;
    $contratistas_porcent = intval($contratistas_porcent_aux);

    //////////viaticos porcent
    ///formula: $viaticos*1/precio_venta
    $viaticos_porcent_aux =$viaticos*1/$precio_venta*100;
    $viaticos_porcent = intval($viaticos_porcent_aux);

    //////////burden porcent
    ///formula: $burden*1/precio_venta
    $burden_porcent_aux =$burden*1/$precio_venta*100;
    $burden_porcent = intval($burden_porcent_aux);

    $total_porcent = $materiales_porcent + $equipos_porcent + $mano_obra_porcent + $vehiculos_porcent + $contratistas_porcent + $viaticos_porcent + $burden_porcent;

    //////////ganancia porcent
    $ga_porcent =0.12;

    /////////ventas porcent
    $ventas_porcent =0.06;

    //////////financiamiento porcent
    $financiamiento_porcent = 0.04;

    //dd($precio_venta);
    //dd(intval($materiales).'_'.intval($equipos).'_'.intval($mano_obra).'_'.intval($vehiculos).'_'.intval($contratistas).'_'.intval($viaticos).'_'.intval($burden).'_'.intval($suma_precios));


    /////////////////GA
    /////formula: $ga_porcent * $precio_venta
    $ga_aux = $ga_porcent * $precio_venta;
    $ga = ceil($ga_aux);
    ////////////ventas
    ///formula: $ventas_porcent * $precio_venta
    $ventas_aux = $ventas_porcent * $precio_venta;
    $ventas = ceil($ventas_aux);

    ////////////financiamiento
    ////formula: $financiamiento_porcent * $precio_venta
    $financiamiento_aux = $financiamiento_porcent * $precio_venta;
    $financiamiento = ceil($financiamiento_aux);


    ////////////ganancia_porcent
    //////formula: 1-$total_porcent-$ga_porcent-$ventas_porcent-$financiamiento_porcent
    $total_porcent_porcent = $total_porcent/100;
    $ganancia_porcent_aux=1-$total_porcent_porcent-$ga_porcent-$ventas_porcent-$financiamiento_porcent;
    $ganancia_porcent = intval($ganancia_porcent_aux*100);

    ///////////Ganancia
    ///formula: $precio_venta * $ganancia_porcent
    $ganancia = $precio_venta * $ganancia_porcent/100;



    ////////////////////////Calculo anual de mano de obra

    //////////Dias mantenimiento
     $dias_mantenimiento = $suma_dias;

    //////////tiempo mantenimiento
    $tiempo_mantenimiento = $horas_hombre_mantenimiento;

    //////////tiempo traslados
    $tiempo_traslados = $horas_hombre_traslados;

    //////////tiempo acceso edificio
    $tiempo_acceso_edificio = $horas_hombre_ingresos_egresos;

    //////////tiempo garantias
    $tiempo_garantias = $horas_hombre_garantia;

    $format_precio_venta = '$'.number_format($precio_venta);

    //total_horas///////////
    $total_horas = $horas_hombre_mantenimiento + $horas_hombre_ingresos_egresos + $horas_hombre_traslados + $horas_hombre_garantia;

    //guardar en array_speed_plan

    array_push($array_speed_plan,$materiales,$equipos,$mano_obra,$vehiculos,$contratistas,$viaticos,$burden,$ga,$ventas,$financiamiento,$suma_precios,$total_horas,$tiempo_mantenimiento,$tiempo_garantias,$precio_venta);
    // Guardar el array actualizado en la sesión
    session(['array_speed_plan' => $array_speed_plan]);

    //ceil reondea a entero superior
   array_push($analisis_costo_mant_array,$format_precio_venta,ceil($dias_mantenimiento),ceil($tiempo_mantenimiento),ceil($tiempo_traslados),ceil($tiempo_acceso_edificio),ceil($tiempo_garantias),$format_suma_costos);

    return response()->json($analisis_costo_mant_array);
}

public function spend_plan_base_adicionales(Request $request)
{

/*  array_push($array_speed_plan,$materiales,$equipos,$mano_obra,$vehiculos,$contratistas,$viaticos,$burden,$ga,$ventas,$financiamiento,$suma_precios); */

    $analisis_costo_mant_array = [];
    // Obtener array_sistemas de la sesión
    $array_speed_plan = Session::get('array_speed_plan');


    ////////////////////////////materiales
    ////////////formula '$materiales_sp+'Cálculo Spen Plan 40% + Adic'!I8

    $costos_costos_filtro_aire_adicionales_aux = $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);
    $filtro_adicionales = $this->precio_to_integer($request->values['filtro_adicionales_adicionales']);
    $refacciones_basicas =  $this->precio_to_integer($request->values['refacciones_basicas_adicionales']);
    $filtro_aceite_chiller = $this->precio_to_integer($request->values['filtro_aceite_chiller_adicionales']);
    $filtro_secador_chiller =  $this->precio_to_integer($request->values['filtro_secador_chiller_adicionales']);

    $mariales_adicionales = intval($costos_costos_filtro_aire_adicionales_aux)+$filtro_adicionales+$refacciones_basicas+$filtro_aceite_chiller+ $filtro_secador_chiller;

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


    $andamios_gruas = $this->precio_to_integer($request->values['andamios_gruas_adicionales']);
    $viaticos = $this->precio_to_integer($request->values['viaticos_adicionales']);
    $contratistas =  $this->precio_to_integer($request->values['contratistas_adicionales']);
    $pruebas_acidez_basoca = $this->precio_to_integer($request->values['pruebas_acidez_basica_adicionales']);
    $pruebas_aceite_laboratorio =  $this->precio_to_integer($request->values['pruebas_aceite_laboratorio_adicionales']);
    $pruebas_refrigerante_adicionales = $this->precio_to_integer($request->values['pruebas_refrigerante_adicionales']);
    $eddy_current_test_adicionales = $this->precio_to_integer($request->values['eddy_current_test_adicionales']);
    $limpieza_evaporador_chiller =  $this->precio_to_integer($request->values['limpieza_evaporador_chiller_adicionales']);
    $limpeza_condenzador_agua_adicionales = $this->precio_to_integer($request->values['limpeza_condenzador_agua_adicionales']);
    $cambio_aceite_chillers_adicionales =  $this->precio_to_integer($request->values['cambio_aceite_chillers_adicionales']);
    $limpieza_anual_torres_adicionales =  $this->precio_to_integer($request->values['limpieza_anual_torres_adicionales']);


    $contratistas_adicionales = $andamios_gruas+$viaticos+$contratistas+$pruebas_acidez_basoca+$pruebas_aceite_laboratorio+$pruebas_refrigerante_adicionales+$eddy_current_test_adicionales+$limpieza_evaporador_chiller+$limpeza_condenzador_agua_adicionales+$cambio_aceite_chillers_adicionales+$limpieza_anual_torres_adicionales;

    //contratistras adicioonales



    //$viaticos_adicionales_aux = explode('$',$request->values['viaticos_adicionales']);
    $viaticos_adicionales = $this->precio_to_integer($request->values['viaticos_adicionales']);

    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
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

    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    $materiales = $array_speed_plan[0];
    $equipos = 0;
    $vehiculos = $array_speed_plan[3];
    $contratistas = $array_speed_plan[4];
    $viaticos = $array_speed_plan[5];
    $burden = $array_speed_plan[6];

    $ga =$array_speed_plan[7];
    $ventas =$array_speed_plan[8];
    $financiamiento =$array_speed_plan[9];
    $total_horas = $array_speed_plan[11];

    //////////////////////materiales
    $materiales_sp_adicionales =  $materiales+$mariales_adicionales;

    //////////////////////equipos
    $equipos_sp_adicionales = $equipos;

    /////////////////////mano de obra adcionales
    /////formula: ($array_speed_plan[2]+$suma_mano_obra+tiempo_adicional_accesos_adicionales+servicio_emergencias_adicionales)*'personal_enviado'

    $suma_mano_obra = $servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

    $mano_de_obra_sp_adicionales = ($total_horas+$suma_mano_obra)*$personal_enviado;

    //////////////////////vehiculos
    //////formula: distancia_sitio_mantenimiento*2*dias_mantenimiento*1.2

    ////diaS_mantenimiento
    ///formula: $mano_de_obra_sp_adicionales/personal_enviado/7
    $dias_mantenimiento = $mano_de_obra_sp_adicionales / $personal_enviado / 7;

    $vehiculos_sp_adicionales = $distancia_sitio_mantenimiento*2*$dias_mantenimiento*1.2;


    //////////////////////contratistas
    $contratistas_sp_adicionales = $contratistas_adicionales;

    //////////////////////viaticos
    $viaticos_sp_adicionales = $viaticos_adicionales;

     //////////////////////burden
     ////formula:(mano_de_obra_sp_adicionales/personal_enviado)*valor_burden
     $burden_sp_adicionales = ($mano_de_obra_sp_adicionales  / $personal_enviado) * $valor_burden;


     $total = $materiales_sp_adicionales + $equipos_sp_adicionales + $mano_de_obra_sp_adicionales + $vehiculos_sp_adicionales + $contratistas_sp_adicionales + $viaticos_sp_adicionales + $burden_sp_adicionales;


    //////////////////////precio_venta
    //////////formula: $total*1/(1-0.4)
     $precio_venta = $total*1/(1-0.4);
     $format_total_money = '$'.number_format($precio_venta);


    ////////////////////////////////////porcentajes////////////////////////////////////////////////

    ///////////////////////materiales_sp_adicionales
    ////formula: materiales_sp_adicionales*$E$4/$D$4
    $materiales_sp_porcent =$materiales_sp_adicionales*1/$precio_venta;

    $equipos_sp_porcent = $equipos_sp_adicionales*1/$precio_venta;

    $mano_obra_sp_porcent = $mano_de_obra_sp_adicionales*1/$precio_venta;

    $vehiculos_sp_porcent = $vehiculos_sp_adicionales*1/$precio_venta;

    $contratistas_sp_porcent =  $contratistas_sp_adicionales*1/$precio_venta;

    $viaticos_sp_porcent = $viaticos_sp_adicionales*1/$precio_venta;

    $burden_sp_porcent = $burden_sp_adicionales*1/$precio_venta;

    /////////////suma_sp_porcent
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
    /////formula:$array_speed_plan[12]+'suma_mano_obta
    $suma_mano_obra_para_tiempo_mantenimiento = $curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;
    $tiempo_mantenimiento_sp = $array_speed_plan[12]+$suma_mano_obra_para_tiempo_mantenimiento;

    /////////////////////tiempo traslados
    /////formula:dias_mantenimiento*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
    $tiempo_traslados_sp = $dias_mantenimiento*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

    /////////////////////tiempo acceso edificio
    ////formula:(dias_mantenimiento*2)+tiempo_adicional_accesos_adicionales
    $tiempo_acceso_edificio = ($dias_mantenimiento*2)+$tiempo_adicional_accesos_adicionales;


    ///////////////////tiempo de garantias
    /////formula: $array_speed_plan[13]+$servicio_emergencias_adicionales

    $tiempo_garantias = $array_speed_plan[13]+$servicio_emergencias_adicionales;


    //valores para grafica costos mantenimiento
    $costo_estimado_sistema_adicionales = $this->precio_to_integer($request->values['costo_estimado_sistema_hvac']);
    $valor_contrato_anual_base = $array_speed_plan[14];
    $arry_grafic = [];

    //obtiene el valor de grafica_costos_mantenimiento
    $arry_grafic = $this->grafica_costos_mantenimiento($costo_estimado_sistema_adicionales,$valor_contrato_anual_base,intval($precio_venta));

    //guardar en array_speed_plan
    array_push($analisis_costo_mant_array
    ,$format_total_money
    ,ceil($dias_mantenimiento)
    ,ceil($tiempo_mantenimiento_sp)
    ,ceil($tiempo_traslados_sp)
    ,ceil($tiempo_acceso_edificio)
    ,ceil($tiempo_garantias)
    ,ceil($materiales_sp_adicionales)
    ,ceil($equipos_sp_adicionales)
    ,ceil($mano_de_obra_sp_adicionales)
    ,ceil($vehiculos_sp_adicionales)
    ,ceil($contratistas_sp_adicionales)
    ,ceil($viaticos_sp_adicionales)
    ,ceil($burden_sp_adicionales)
    ,ceil($ga_sp)
    ,ceil($ventas_sp)
    ,ceil($financiamiento_sp)
    ,ceil($materiales_sp_porcent*100).'%'
    ,ceil($equipos_sp_porcent*100).'%'
    ,ceil($mano_obra_sp_porcent*100).'%'
    ,ceil($vehiculos_sp_porcent*100).'%'
    ,ceil($contratistas_sp_porcent*100).'%'
    ,ceil($viaticos_sp_porcent*100).'%'
    ,ceil($burden_sp_porcent*100).'%'
    ,ceil($ga_sp_porcent*100).'%'
    ,ceil($ventas_sp_porcent*100).'%'
    ,ceil($financiamiento_sp_porcent*100).'%'
    ,ceil($ganancia_sp_porcent*100).'%'
    ,ceil($ganancia_sp)
    ,$arry_grafic[0]
    ,$arry_grafic[1]
    ,$arry_grafic[2]
    ,$arry_grafic[3]
    ,$arry_grafic[4]
);

    return response()->json($analisis_costo_mant_array);
}

public function spend_plan_base_adicionales_edit(Request $request,$id_project)
{



    $analisis_costo_mant_array = [];
    // Obtener array_sistemas de la sesión
    $array_speed_plan = Session::get('array_speed_plan');

    ////////////////////////////materiales
    ////////////formula '$materiales_sp+'Cálculo Spen Plan 40% + Adic'!I8

    $costos_costos_filtro_aire_adicionales_aux = $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);
    $filtro_adicionales = $this->precio_to_integer($request->values['filtro_adicionales_adicionales']);
    $refacciones_basicas =  $this->precio_to_integer($request->values['refacciones_basicas_adicionales']);
    $filtro_aceite_chiller = $this->precio_to_integer($request->values['filtro_aceite_chiller_adicionales']);
    $filtro_secador_chiller =  $this->precio_to_integer($request->values['filtro_secador_chiller_adicionales']);

    $mariales_adicionales = intval($costos_costos_filtro_aire_adicionales_aux)+$filtro_adicionales+$refacciones_basicas+$filtro_aceite_chiller+ $filtro_secador_chiller;

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


    $andamios_gruas = $this->precio_to_integer($request->values['andamios_gruas_adicionales']);
    $viaticos = $this->precio_to_integer($request->values['viaticos_adicionales']);
    $contratistas =  $this->precio_to_integer($request->values['contratistas_adicionales']);
    $pruebas_acidez_basoca = $this->precio_to_integer($request->values['pruebas_acidez_basica_adicionales']);
    $pruebas_aceite_laboratorio =  $this->precio_to_integer($request->values['pruebas_aceite_laboratorio_adicionales']);
    $pruebas_refrigerante_adicionales = $this->precio_to_integer($request->values['pruebas_refrigerante_adicionales']);
    $eddy_current_test_adicionales = $this->precio_to_integer($request->values['eddy_current_test_adicionales']);
    $limpieza_evaporador_chiller =  $this->precio_to_integer($request->values['limpieza_evaporador_chiller_adicionales']);
    $limpeza_condenzador_agua_adicionales = $this->precio_to_integer($request->values['limpeza_condenzador_agua_adicionales']);
    $cambio_aceite_chillers_adicionales =  $this->precio_to_integer($request->values['cambio_aceite_chillers_adicionales']);
    $limpieza_anual_torres_adicionales =  $this->precio_to_integer($request->values['limpieza_anual_torres_adicionales']);


    $contratistas_adicionales = $andamios_gruas+$viaticos+$contratistas+$pruebas_acidez_basoca+$pruebas_aceite_laboratorio+$pruebas_refrigerante_adicionales+$eddy_current_test_adicionales+$limpieza_evaporador_chiller+$limpeza_condenzador_agua_adicionales+$cambio_aceite_chillers_adicionales+$limpieza_anual_torres_adicionales;

    //contratistras adicioonales



    //$viaticos_adicionales_aux = explode('$',$request->values['viaticos_adicionales']);
    $viaticos_adicionales = $this->precio_to_integer($request->values['viaticos_adicionales']);

    if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
    if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
    $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
    ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
    }
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

    $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
    $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
    $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];

    $materiales = $array_speed_plan[0];
    $equipos = 0;
    $vehiculos = $array_speed_plan[3];
    $contratistas = $array_speed_plan[4];
    $viaticos = $array_speed_plan[5];
    $burden = $array_speed_plan[6];

    $ga =$array_speed_plan[7];
    $ventas =$array_speed_plan[8];
    $financiamiento =$array_speed_plan[9];
    $total_horas = $array_speed_plan[11];

    //////////////////////materiales
    $materiales_sp_adicionales =  $materiales+$mariales_adicionales;

    //////////////////////equipos
    $equipos_sp_adicionales = $equipos;

    /////////////////////mano de obra adcionales
    /////formula: ($array_speed_plan[2]+$suma_mano_obra+tiempo_adicional_accesos_adicionales+servicio_emergencias_adicionales)*'personal_enviado'

    $suma_mano_obra = $servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

    $mano_de_obra_sp_adicionales = ($total_horas+$suma_mano_obra)*$personal_enviado;

    //////////////////////vehiculos
    //////formula: distancia_sitio_mantenimiento*2*dias_mantenimiento*1.2

    ////diaS_mantenimiento
    ///formula: $mano_de_obra_sp_adicionales/personal_enviado/7
    $dias_mantenimiento = $mano_de_obra_sp_adicionales / $personal_enviado / 7;

    $vehiculos_sp_adicionales = $distancia_sitio_mantenimiento*2*$dias_mantenimiento*1.2;


    //////////////////////contratistas
    $contratistas_sp_adicionales = $contratistas_adicionales;

    //////////////////////viaticos
    $viaticos_sp_adicionales = $viaticos_adicionales;

     //////////////////////burden
     ////formula:(mano_de_obra_sp_adicionales/personal_enviado)*valor_burden
     $burden_sp_adicionales = ($mano_de_obra_sp_adicionales  / $personal_enviado) * $valor_burden;


     $total = $materiales_sp_adicionales + $equipos_sp_adicionales + $mano_de_obra_sp_adicionales + $vehiculos_sp_adicionales + $contratistas_sp_adicionales + $viaticos_sp_adicionales + $burden_sp_adicionales;


    //////////////////////precio_venta
    //////////formula: $total*1/(1-0.4)
     $precio_venta = $total*1/(1-0.4);
     $format_total_money = '$'.number_format($precio_venta);


    ////////////////////////////////////porcentajes////////////////////////////////////////////////

    ///////////////////////materiales_sp_adicionales
    ////formula: materiales_sp_adicionales*$E$4/$D$4
    $materiales_sp_porcent =$materiales_sp_adicionales*1/$precio_venta;

    $equipos_sp_porcent = $equipos_sp_adicionales*1/$precio_venta;

    $mano_obra_sp_porcent = $mano_de_obra_sp_adicionales*1/$precio_venta;

    $vehiculos_sp_porcent = $vehiculos_sp_adicionales*1/$precio_venta;

    $contratistas_sp_porcent =  $contratistas_sp_adicionales*1/$precio_venta;

    $viaticos_sp_porcent = $viaticos_sp_adicionales*1/$precio_venta;

    $burden_sp_porcent = $burden_sp_adicionales*1/$precio_venta;

    /////////////suma_sp_porcent
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
    /////formula:$array_speed_plan[12]+'suma_mano_obta
     $suma_mano_obra_para_tiempo_mantenimiento = $curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;
    $tiempo_mantenimiento_sp = $array_speed_plan[12]+$suma_mano_obra_para_tiempo_mantenimiento;

    /////////////////////tiempo traslados
    /////formula:dias_mantenimiento*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
    $tiempo_traslados_sp = $dias_mantenimiento*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

    /////////////////////tiempo acceso edificio
    ////formula:(dias_mantenimiento*2)+tiempo_adicional_accesos_adicionales
    $tiempo_acceso_edificio = ($dias_mantenimiento*2)+$tiempo_adicional_accesos_adicionales;


    ///////////////////tiempo de garantias
    /////formula: $array_speed_plan[13]+$servicio_emergencias_adicionales

    $tiempo_garantias = $array_speed_plan[13]+$servicio_emergencias_adicionales;

    //valores para grafica costos mantenimiento
    //valores para grafica costos mantenimiento
    $costo_estimado_sistema_adicionales = $this->precio_to_integer($request->values['costo_estimado_sistema_hvac']);
    $valor_contrato_anual_base = $array_speed_plan[14];
    $arry_grafic = [];

    //obtiene el valor de grafica_costos_mantenimiento
    $arry_grafic = $this->grafica_costos_mantenimiento($costo_estimado_sistema_adicionales,$valor_contrato_anual_base,intval($precio_venta));

    //guardar en array_speed_plan
    array_push($analisis_costo_mant_array
    ,$format_total_money
    ,ceil($dias_mantenimiento)
    ,ceil($tiempo_mantenimiento_sp)
    ,ceil($tiempo_traslados_sp)
    ,ceil($tiempo_acceso_edificio)
    ,ceil($tiempo_garantias)
    ,ceil($materiales_sp_adicionales)
    ,ceil($equipos_sp_adicionales)
    ,ceil($mano_de_obra_sp_adicionales)
    ,ceil($vehiculos_sp_adicionales)
    ,ceil($contratistas_sp_adicionales)
    ,ceil($viaticos_sp_adicionales)
    ,ceil($burden_sp_adicionales)
    ,ceil($ga_sp)
    ,ceil($ventas_sp)
    ,ceil($financiamiento_sp)
    ,ceil($materiales_sp_porcent*100).'%'
    ,ceil($equipos_sp_porcent*100).'%'
    ,ceil($mano_obra_sp_porcent*100).'%'
    ,ceil($vehiculos_sp_porcent*100).'%'
    ,ceil($contratistas_sp_porcent*100).'%'
    ,ceil($viaticos_sp_porcent*100).'%'
    ,ceil($burden_sp_porcent*100).'%'
    ,ceil($ga_sp_porcent*100).'%'
    ,ceil($ventas_sp_porcent*100).'%'
    ,ceil($financiamiento_sp_porcent*100).'%'
    ,ceil($ganancia_sp_porcent*100).'%'
    ,ceil($ganancia_sp)
    ,$arry_grafic[0]
    ,$arry_grafic[1]
    ,$arry_grafic[2]
    ,$arry_grafic[3]
    ,$arry_grafic[4]
);

    return response()->json($analisis_costo_mant_array);
}

    public function spend_plan_base_adicionales_gp(Request $request, $porcent){

        $analisis_costo_mant_array = [];
        // Obtener array_sistemas de la sesión
       $array_speed_plan = Session::get('array_speed_plan');

       ////////////////////////////materiales
        ////////////formula '$materiales_sp+'Cálculo Spen Plan 40% + Adic'!I8

        $costos_costos_filtro_aire_adicionales_aux = $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);
        $filtro_adicionales = $this->precio_to_integer($request->values['filtro_adicionales_adicionales']);
        $refacciones_basicas =  $this->precio_to_integer($request->values['refacciones_basicas_adicionales']);
        $filtro_aceite_chiller = $this->precio_to_integer($request->values['filtro_aceite_chiller_adicionales']);
        $filtro_secador_chiller =  $this->precio_to_integer($request->values['filtro_secador_chiller_adicionales']);

        $mariales_adicionales = intval($costos_costos_filtro_aire_adicionales_aux)+$filtro_adicionales+$refacciones_basicas+$filtro_aceite_chiller+ $filtro_secador_chiller;


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
       $andamios_gruas = $this->precio_to_integer($request->values['andamios_gruas_adicionales']);
        $viaticos = $this->precio_to_integer($request->values['viaticos_adicionales']);
        $contratistas =  $this->precio_to_integer($request->values['contratistas_adicionales']);
        $pruebas_acidez_basoca = $this->precio_to_integer($request->values['pruebas_acidez_basica_adicionales']);
        $pruebas_aceite_laboratorio =  $this->precio_to_integer($request->values['pruebas_aceite_laboratorio_adicionales']);
        $pruebas_refrigerante_adicionales = $this->precio_to_integer($request->values['pruebas_refrigerante_adicionales']);
        $eddy_current_test_adicionales = $this->precio_to_integer($request->values['eddy_current_test_adicionales']);
        $limpieza_evaporador_chiller =  $this->precio_to_integer($request->values['limpieza_evaporador_chiller_adicionales']);
        $limpeza_condenzador_agua_adicionales = $this->precio_to_integer($request->values['limpeza_condenzador_agua_adicionales']);
        $cambio_aceite_chillers_adicionales =  $this->precio_to_integer($request->values['cambio_aceite_chillers_adicionales']);
        $limpieza_anual_torres_adicionales =  $this->precio_to_integer($request->values['limpieza_anual_torres_adicionales']);


        $contratistas_adicionales = $andamios_gruas+$viaticos+$contratistas+$pruebas_acidez_basoca+$pruebas_aceite_laboratorio+$pruebas_refrigerante_adicionales+$eddy_current_test_adicionales+$limpieza_evaporador_chiller+$limpeza_condenzador_agua_adicionales+$cambio_aceite_chillers_adicionales+$limpieza_anual_torres_adicionales;

       //$viaticos_adicionales_aux = explode('$',$request->values['viaticos_adicionales']);
       $viaticos_adicionales = $this->precio_to_integer($request->values['viaticos_adicionales']);

       if($request->values['personal_enviado_mantenimiento'] == 'tecnico'){
        $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
        ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
        }

        if($request->values['personal_enviado_mantenimiento'] == 'tecnico_ayudante'){
        $personal_enviado = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
        ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
        }

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

        $distancia_sitio_mantenimiento_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
       $distancia_sitio_mantenimiento= intval($distancia_sitio_mantenimiento_aux[0]);
       $velocidad_promedio_mantenimiento = $request->values['velocidad_promedio_mantenimiento'];


       $materiales = $array_speed_plan[0];
       $equipos = 0;
       $vehiculos = $array_speed_plan[3];
       $contratistas = $array_speed_plan[4];
       $viaticos = $array_speed_plan[5];
       $burden = $array_speed_plan[6];

       $ga =$array_speed_plan[7];
       $ventas =$array_speed_plan[8];
       $financiamiento =$array_speed_plan[9];
       $total_horas = $array_speed_plan[11];

   //////////////////////materiales
    $materiales_sp_adicionales =  $materiales+$mariales_adicionales;

    //////////////////////equipos
    $equipos_sp_adicionales = $equipos;

    /////////////////////mano de obra adcionales
    /////formula: ($array_speed_plan[2]+$suma_mano_obra+tiempo_adicional_accesos_adicionales+servicio_emergencias_adicionales)*'personal_enviado'

    $suma_mano_obra = $servicio_emergencias_adicionales+$tiempo_adicional_accesos_adicionales+$curso_seguridad_otros_adicionales+$lavado_filtros_aire_adicionales+$lavado_evaporadores_adicionales+$lavado_extra_condensadores_adicionales+$lavado_ventiladores_adicionales+$limpieza_grasa_adicionales;

    $mano_de_obra_sp_adicionales = ($total_horas+$suma_mano_obra)*$personal_enviado;

    //////////////////////vehiculos
    //////formula: distancia_sitio_mantenimiento*2*dias_mantenimiento*1.2

    ////diaS_mantenimiento
    ///formula: $mano_de_obra_sp_adicionales/personal_enviado/7
    $dias_mantenimiento = $mano_de_obra_sp_adicionales / $personal_enviado / 7;

    $vehiculos_sp_adicionales = $distancia_sitio_mantenimiento*2*$dias_mantenimiento*1.2;


    //////////////////////contratistas
    $contratistas_sp_adicionales = $contratistas_adicionales;

    //////////////////////viaticos
    $viaticos_sp_adicionales = $viaticos_adicionales;

     //////////////////////burden
     ////formula:(mano_de_obra_sp_adicionales/personal_enviado)*valor_burden
     $burden_sp_adicionales = ($mano_de_obra_sp_adicionales  / $personal_enviado) * $valor_burden;


     $total = $materiales_sp_adicionales + $equipos_sp_adicionales + $mano_de_obra_sp_adicionales + $vehiculos_sp_adicionales + $contratistas_sp_adicionales + $viaticos_sp_adicionales + $burden_sp_adicionales;


    //////////////////////precio_venta
    //////////formula: total*1/(1-porcent_aux)

        $porcent_aux = $porcent/100;
        $precio_venta = $total*1/(1-$porcent_aux);
        $format_total_money = '$'.number_format($precio_venta);


       ////////////////////////////////////porcentajes////////////////////////////////////////////////

    ///////////////////////materiales_sp_adicionales
    ////formula: materiales_sp_adicionales*$E$4/$D$4
    $materiales_sp_porcent =$materiales_sp_adicionales*1/$precio_venta;

    $equipos_sp_porcent = $equipos_sp_adicionales*1/$precio_venta;

    $mano_obra_sp_porcent = $mano_de_obra_sp_adicionales*1/$precio_venta;

    $vehiculos_sp_porcent = $vehiculos_sp_adicionales*1/$precio_venta;

    $contratistas_sp_porcent =  $contratistas_sp_adicionales*1/$precio_venta;

    $viaticos_sp_porcent = $viaticos_sp_adicionales*1/$precio_venta;

    $burden_sp_porcent = $burden_sp_adicionales*1/$precio_venta;

    /////////////suma_sp_porcent
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
    /////formula:$array_speed_plan[12]+'suma_mano_obta
    $tiempo_mantenimiento_sp = $array_speed_plan[12]+$suma_mano_obra;

    /////////////////////tiempo traslados
    /////formula:dias_mantenimiento*distancia_sitio_mantenimiento*2/velocidad_promedio_mantenimiento
    $tiempo_traslados_sp = $dias_mantenimiento*$distancia_sitio_mantenimiento*2/$velocidad_promedio_mantenimiento;

    /////////////////////tiempo acceso edificio
    ////formula:(dias_mantenimiento*2)+tiempo_adicional_accesos_adicionales
    $tiempo_acceso_edificio = ($dias_mantenimiento*2)+$tiempo_adicional_accesos_adicionales;


    ///////////////////tiempo de garantias
    /////formula: $array_speed_plan[13]+$servicio_emergencias_adicionales

    $tiempo_garantias = $array_speed_plan[13]+$servicio_emergencias_adicionales;

       array_push($analisis_costo_mant_array
       ,$format_total_money
       ,ceil($dias_mantenimiento)
       ,ceil($tiempo_mantenimiento_sp)
       ,ceil($tiempo_traslados_sp)
       ,ceil($tiempo_acceso_edificio)
       ,ceil($tiempo_garantias)
       ,ceil($materiales_sp_adicionales)
       ,ceil($equipos_sp_adicionales)
       ,ceil($mano_de_obra_sp_adicionales)
       ,ceil($vehiculos_sp_adicionales)
       ,ceil($contratistas_sp_adicionales)
       ,ceil($viaticos_sp_adicionales)
       ,ceil($burden_sp_adicionales)
       ,ceil($ga_sp)
       ,ceil($ventas_sp)
       ,ceil($financiamiento_sp)
       ,ceil($materiales_sp_porcent*100).'%'
       ,ceil($equipos_sp_porcent*100).'%'
       ,ceil($mano_obra_sp_porcent*100).'%'
       ,ceil($vehiculos_sp_porcent*100).'%'
       ,ceil($contratistas_sp_porcent*100).'%'
       ,ceil($viaticos_sp_porcent*100).'%'
       ,ceil($burden_sp_porcent*100).'%'
       ,ceil($ga_sp_porcent*100).'%'
       ,ceil($ventas_sp_porcent*100).'%'
       ,ceil($financiamiento_sp_porcent*100).'%'
       ,ceil($ganancia_sp_porcent*100).'%'
       ,ceil($ganancia_sp)
   );

       return response()->json($analisis_costo_mant_array);
    }

    public function grafica_costos_mantenimiento($costo_estimado_sistema_adicionales,$valor_contrato_anual_base,$valor_contrato_anual_adicional){

        $arry_grafica_costos_mantenimiento = [];
        $ideal = $costo_estimado_sistema_adicionales*0.04;
        $tipico = $costo_estimado_sistema_adicionales*0.08;
        $malo = $costo_estimado_sistema_adicionales*0.10;
        $base = $valor_contrato_anual_base;
        $c_adicionales = $valor_contrato_anual_adicional;
        array_push($arry_grafica_costos_mantenimiento,$ideal,$tipico,$malo,$base,$c_adicionales);
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

    public function traer_mantenimiento_equipos($id_project){
        $mantenimiento_equipos = MantenimientoEquiposModel::where('id_project','=',$id_project)->get();
        $ids = [];
        foreach($mantenimiento_equipos as $id_mant){
            array_push($ids,$id_mant->id);
        }

        $array_equipo = [];
        $array_to_response = [];

        $counter = 0;

        foreach($ids as $id){
        $counter = $counter + 1;
            $mantenimiento = MantenimientoEquiposModel::find($id);
            if($mantenimiento->id === $id){
            $sistema = SistemasModel::find($mantenimiento->sistema);
            $unidad = UnidadesModel::where('identificador','=',$mantenimiento->unidad)->first()->unidad;
            $marca = MarcasEmpresaModel::find($mantenimiento->id_marca)->marca;
            $modelo = ModelosEmpresaModel::find($mantenimiento->id_modelo)->modelo;
            $acceso = FactorAccesoModel::find($mantenimiento->acceso)->factor;
            $estado = FactorEstadoUnidad::find($mantenimiento->estado_unidad)->factor;
            $suma_adicionales = $mantenimiento->costo_total_filtros;


                    array_push(
                        $array_equipo,
                        $counter,
                        $sistema->name,   //sistema_mantenimiento
                        $unidad,  //unidad_mantenimiento
                        $marca,  //marca_mantenimiento
                        $modelo,  //modelo_mantenimiento
                        $mantenimiento->capacidad,  //capacidad_termica_mantenimiento
                        $mantenimiento->cantidad,  //cantidad_unidades_mantenimiento
                        $mantenimiento->yrs_life,  //yrs_vida_mantenimiento
                        strtoupper($acceso),  //tipo_acceso_mantenimiento
                        strtoupper($estado),  //estado_unidad_mantenimiento
                        $mantenimiento->hrs_diarias.'_hidden',  //horas_diarias_mantenimiento
                        $mantenimiento->cambio_filtros.'_hidden',   //cambio_filtros_mantenimiento
                        $mantenimiento->costo_cambio_filtros.'_hidden',   //costo_filtro_mantenimiento
                        $mantenimiento->cambios_anuales.'_hidden',//cantidad_filtros_mantenimiento
                        $mantenimiento->unidad.'_hidden',
                        $suma_adicionales.'_hidden',
                        ''.'_hidden',
                        ''.'_hidden',
                        $mantenimiento->total_horas.'_hidden',
                        $mantenimiento->hora_dia.'_hidden',
                        $mantenimiento->dias.'_hidden',
                        $mantenimiento->idas_ajustados.'_hidden',
                        $mantenimiento->id.'_hidden',
                    );

                }

            array_push($array_to_response,$array_equipo);
            $array_equipo = [];

        }

return response()->json($array_to_response);
    }

    //delete mantenimiento equipo
    public function delete_mantenimiento_equipo($id){
        $mantenimiento = MantenimientoEquiposModel::find($id);
        $id_project = $mantenimiento->id_project;
        if($mantenimiento->delete()){
            return response()->json($id_project);
        }else{
            return response()->json(['status' => 'error']);
        }

    }

    public function edit_regstro_edit(Request  $request,$id){

                $arry_res_sistema = [];
                $mantenimiento = MantenimientoEquiposModel::find($id);

                $id_unidad = $mantenimiento->unidad;
                array_push(
                    $arry_res_sistema,
                    $id,
                    $mantenimiento->sistema,  //sistema_mantenimiento
                    $id_unidad,  //unidad_mantenimiento
                    $mantenimiento->id_marca,  //marca_mantenimiento
                    $mantenimiento->id_modelo,  //modelo_mantenimiento
                    $mantenimiento->capacidad,  //capacidad_termica_mantenimiento
                    $mantenimiento->cantidad,  //cantidad_unidades_mantenimiento
                    $mantenimiento->yrs_life,  //yrs_vida_mantenimiento
                    $mantenimiento->acceso,  //tipo_acceso_mantenimiento
                    $mantenimiento->estado_unidad,  //estado_unidad_mantenimiento
                    $mantenimiento->hrs_diarias,  //horas_diarias_mantenimiento
                    $mantenimiento->cambio_filtros,   //cambio_filtros_mantenimiento
                    $mantenimiento->costo_cambio_filtros,//costo_filtro_mantenimiento
                    $mantenimiento->cambios_anuales,   //cantidad_filtros_mantenimiento
                );


            return response()->json($arry_res_sistema);


    }

    public function traer_mantenimiento_medio_ambiente($id){
        $mantenimiento = MantenimientoProjectsModel::where('id_project','=',$id)
        ->first()->medio_ambiente;
        return $mantenimiento;
    }

    public function nuevo_equipo_mantenimeinto(Request  $request,$id_project){

            $sistema = $request->values[1];
            $unidad = $request->values[2];
            $capacidad_termica_mantenimiento = $request->values[5];
            $cantidad_unidades_mantenimiento = $request->values[6];
            $yrs_vida_mantenimiento = $request->values[7];
            $tipo_acceso_mantenimiento = $request->values[8];
            $estado_unidad_mantenimiento = $request->values[9];
            $cambio_filtros_mantenimiento = $request->values[11];
            $tipo_ambiente_mantenimiento = $request->values[16];
            $ocupacion_semanal_mantenimiento = $request->values[17];

        $horas = $this->horas($capacidad_termica_mantenimiento,$unidad);
        $periodo = $this->periodo($capacidad_termica_mantenimiento,$unidad);
        $fg = 1.03;
        //$costo_instalado = $this->obtener_costo_instalado($unidad);
        //$rav = $this->obtener_rav($unidad);
        $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
        $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
        $feu = $this->obtener_feu($estado_unidad_mantenimiento);
        $fav = $this->obtener_fav($yrs_vida_mantenimiento);
        $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);
        $total_horas = $this->formula_total_horas(intval($horas),intval($cantidad_unidades_mantenimiento),$fa,$fta,$feu,$fav,$fhd,$fg);

                  $hora_dia_aux = $this->div_horas_periodo($total_horas,$periodo);
                  $hora_dia = $this->total_horas_periodo($hora_dia_aux,$periodo);
                  $dias_aux =$hora_dia_aux/7;
                  $dias = $this->redondeo_dias($dias_aux);
                  $dias_ajustados = $this->total_dias_periodo($dias,$periodo);
                  $idas_ajustados = $this->total_idas_periodo($dias,$periodo);

            $id_sistema = $request->values[1];
            $unidad = $request->values[2];
            $marca = $request->values[3];
            $modelo = $request->values[4];

            $acceso = $request->values[8];
            $estado = $request->values[9];

            $horas_diarias = $request->values[10];

            $cambio_filtros = $request->values[11];

            $costo_filtros_price = $this->precio_to_integer($request->values[12]);

            $cantidad_filtros = $request->values[13];

            $suma_adicionales = $costo_filtros_price * intval($request->values[13]) * intval($request->values[6]);

            $new_equipo_mantenimiento = new MantenimientoEquiposModel;
            $new_equipo_mantenimiento->id_project =$id_project;;
            $new_equipo_mantenimiento->sistema = $id_sistema;
            $new_equipo_mantenimiento->unidad = $unidad;
            $new_equipo_mantenimiento->id_marca = $marca;
            $new_equipo_mantenimiento->id_modelo = $modelo;
            $new_equipo_mantenimiento->yrs_life = $request->values[7];
            $new_equipo_mantenimiento->capacidad = $request->values[5];
            $new_equipo_mantenimiento->capacidad_unidad = 'TR';
            $new_equipo_mantenimiento->hrs_diarias = $horas_diarias;
            $new_equipo_mantenimiento->acceso = $acceso;
            $new_equipo_mantenimiento->estado_unidad = $estado;
            $new_equipo_mantenimiento->cambio_filtros = $cambio_filtros;
            $new_equipo_mantenimiento->costo_cambio_filtros = $costo_filtros_price;
            $new_equipo_mantenimiento->costo_total_filtros = $suma_adicionales;
            $new_equipo_mantenimiento->cantidad = $request->values[6];
            $new_equipo_mantenimiento->cambios_anuales = $cantidad_filtros;
            $new_equipo_mantenimiento->total_horas = $total_horas;
            $new_equipo_mantenimiento->hora_dia = $hora_dia;
            $new_equipo_mantenimiento->dias = $dias_ajustados;
            $new_equipo_mantenimiento->idas_ajustados = $idas_ajustados;
            $new_equipo_mantenimiento->id_empresa = Auth::user()->id_empresa;
            $new_equipo_mantenimiento->save();

    }

    public function update_registro_edit(Request $request,$id_equipo){


        $sistema = $request->values[1];
        $unidad = $request->values[2];
        $capacidad_termica_mantenimiento = $request->values[5];
        $cantidad_unidades_mantenimiento = $request->values[6];
        $yrs_vida_mantenimiento = $request->values[7];
        $tipo_acceso_mantenimiento = $request->values[8];
        $estado_unidad_mantenimiento = $request->values[9];
        $cambio_filtros_mantenimiento = $request->values[11];
        $tipo_ambiente_mantenimiento = $request->values[16];
        $ocupacion_semanal_mantenimiento = $request->values[17];
        $horas = $this->horas($capacidad_termica_mantenimiento,$unidad);
        $periodo = $this->periodo($capacidad_termica_mantenimiento,$unidad);

        $fg = 1.03;
        //$costo_instalado = $this->obtener_costo_instalado($unidad);
        //$rav = $this->obtener_rav($unidad);
        $fa = $this->obtener_fa($tipo_ambiente_mantenimiento);
        $fta = $this->obtener_fta($tipo_acceso_mantenimiento);
        $feu = $this->obtener_feu($estado_unidad_mantenimiento);
        $fav = $this->obtener_fav($yrs_vida_mantenimiento);
        $fhd = $this->obtener_fhd($ocupacion_semanal_mantenimiento);
        $total_horas = $this->formula_total_horas(intval($horas),intval($cantidad_unidades_mantenimiento),$fa,$fta,$feu,$fav,$fhd,$fg);
//coordinacion resultados
        $hora_dia_aux = $this->div_horas_periodo($total_horas,$periodo);
        $hora_dia = $this->total_horas_periodo($hora_dia_aux,$periodo);
        $dias_aux =$hora_dia_aux/7;
        $dias = $this->redondeo_dias($dias_aux);
        $dias_ajustados = $this->total_dias_periodo($dias,$periodo);
        $idas_ajustados = $this->total_idas_periodo($dias,$periodo);

        $id_sistema = $request->values[1];
        $unidad = $request->values[2];
        $marca = $request->values[3];
        $modelo = $request->values[4];

        $acceso = $request->values[8];
        $estado = $request->values[9];

        $horas_diarias = $request->values[10];

        $cambio_filtros = $request->values[11];

        $costo_filtros_price = $this->precio_to_integer($request->values[12]);

        $cantidad_filtros = $request->values[13];

        $suma_adicionales = $costo_filtros_price * intval($request->values[13]) * intval($request->values[6]);

        $new_equipo_mantenimiento = MantenimientoEquiposModel::find($id_equipo);
        $new_equipo_mantenimiento->sistema = $id_sistema;
        $new_equipo_mantenimiento->unidad = $unidad;
        $new_equipo_mantenimiento->id_marca = $marca;
        $new_equipo_mantenimiento->id_modelo = $modelo;
        $new_equipo_mantenimiento->yrs_life = $request->values[7];
        $new_equipo_mantenimiento->capacidad = $request->values[5];
        $new_equipo_mantenimiento->capacidad_unidad = 'TR';
        $new_equipo_mantenimiento->hrs_diarias = $horas_diarias;
        $new_equipo_mantenimiento->acceso = $acceso;
        $new_equipo_mantenimiento->estado_unidad = $estado;
        $new_equipo_mantenimiento->cambio_filtros = $cambio_filtros;
        $new_equipo_mantenimiento->costo_cambio_filtros = $costo_filtros_price;
        $new_equipo_mantenimiento->costo_total_filtros = $suma_adicionales;
        $new_equipo_mantenimiento->cantidad = $request->values[6];
        $new_equipo_mantenimiento->cambios_anuales = $cantidad_filtros;
        $new_equipo_mantenimiento->total_horas = $total_horas;
        $new_equipo_mantenimiento->hora_dia = $hora_dia;
        $new_equipo_mantenimiento->dias = $dias_ajustados;
        $new_equipo_mantenimiento->idas_ajustados = $idas_ajustados;
        $new_equipo_mantenimiento->id_empresa = Auth::user()->id_empresa;
        $new_equipo_mantenimiento->update();

        return $new_equipo_mantenimiento->id_project;

}

    public function edit_unidades_horas(Request $request,$id_equipo){

        $id_aux = explode('_',$id_equipo);
        $id = $id_aux[2];
        $tipo = $request->tipo;
        $registro = $request->registro;
        $value = $request->value;
        switch ($tipo) {

            case 'tr':
                $unidad_tr_update = UnidadesTrModel::find($id);
                $unidad_tr_update->$registro = $request->value;
                $unidad_tr_update->update();
                if ($unidad_tr_update->update()){
                    return response()->json(['status' => 'success']);
                }else{
                    return response()->json(['status' => 'error']);
                }
            break;

            case 'cfm':
                $unidad_tr_update = UnidadesCfmModel::find($id);
                $unidad_tr_update->$registro = $request->value;
                $unidad_tr_update->update();
                if ($unidad_tr_update->update()){
                    return response()->json(['status' => 'success']);
                }else{
                    return response()->json(['status' => 'error']);
                }
            break;

            case 'unidad':
                $unidad_tr_update = UnidadesUnidadModel::find($id);
                $unidad_tr_update->$registro = $request->value;
                $unidad_tr_update->update();
                if ($unidad_tr_update->update()){
                    return response()->json(['status' => 'success']);
                }else{
                    return response()->json(['status' => 'error']);
                }
            break;

            default:
                # code...
            break;
        }
    }

    public function horas($capacidad_termica_mantenimiento,$unidad_indentificador){

        $id_unidad = DB::table('unidades')
        ->where('identificador','=',$unidad_indentificador)
        ->first()->id;

        $unidad = 'TR';

        switch ($unidad) {
            case 'TR':

                if($capacidad_termica_mantenimiento == 1 && $capacidad_termica_mantenimiento < 2.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->one;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 3 && $capacidad_termica_mantenimiento < 7.4){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->two;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 7.5 && $capacidad_termica_mantenimiento < 14.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->three;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 15 && $capacidad_termica_mantenimiento < 24.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->four;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 25 && $capacidad_termica_mantenimiento < 49.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->five;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 50 && $capacidad_termica_mantenimiento < 99.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->six;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 100 && $capacidad_termica_mantenimiento < 199.9){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->seven;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                if($capacidad_termica_mantenimiento > 200 && $capacidad_termica_mantenimiento < 350){
                    $horas = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->eight;
                    if($horas == null || $horas == 'NA'){
                        $horas = 0;
                    }
                    return $horas;
                }

                return 0;

                break;
            case 'CFM':
                $horas = UnidadesCfmModel::where('id_unidad','=',$id_unidad)->first()->horas_diarias;
                break;
            case 'Unidad':
                $horas = UnidadesUnidadModel::where('id_unidad','=',$id_unidad)->first()->horas_diarias;
                break;
            default:
                # code...
                break;
        }

        return $horas;
    }

    public function periodo($capacidad_termica_mantenimiento,$unidad){
        $id_unidad = UnidadesModel::where('identificador','=',$unidad)->first()->id;
        $unidad = 'TR';

        switch ($unidad) {
            case 'TR':
                $periodo = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;

            break;

            case 'CFM':
                 $periodo = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;
            break;

            case 'Unidad':
                 $periodo = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;
            break;

            default:
                # code...
            break;
        }

        return $horas;
     }

    public function div_horas_periodo($horas,$periodo){
        switch ($periodo) {
            case 'T':
                $horas_periodo = $horas/4;
                return $horas_periodo;
            break;

            case 'S':
                $horas_periodo = $horas/2;
                return $horas_periodo;
            break;

            case 'A':
                $horas_periodo = $horas;
                return $horas_periodo;
            break;

            default:
                # code...
            break;
        }

     }

   public function total_horas_periodo($hora_dia_aux,$periodo){
            switch ($periodo) {
                case 'T':
                    $hora_redondeo = floor($hora_dia_aux * 10) / 10;  // Mostrar solo un decimal
                    $hora_primer_numero = explode('.',$hora_redondeo);
                    $cinco = 5;
                    $rango_1 = $hora_primer_numero[0];
                    $rango_1_2 = $hora_primer_numero[0].'.5';
                    $rango_2 = $hora_primer_numero[0].'.5';
                    $rango_2_2 = ceil($hora_redondeo);

                    if($hora_redondeo>$rango_1 && $hora_redondeo<$rango_1_2){
                        $horas_auxa = $rango_1.'.'.$cinco;
                    }

                    if($hora_redondeo>=$rango_2 && $hora_redondeo<$rango_2_2){
                        $horas_auxa = ceil($hora_redondeo);
                    }

                    $horas_periodo = $horas_auxa*4;
                    return intval($horas_periodo);
                break;

                case 'S':
                    $hora_redondeo = floor($hora_dia_aux * 10) / 10;  // Mostrar solo un decimal
                    $hora_primer_numero = explode('.',$hora_redondeo);
                    $cinco = 5;
                    $rango_1 = $hora_primer_numero[0];
                    $rango_1_2 = $hora_primer_numero[0].'.5';
                    $rango_2 = $hora_primer_numero[0].'.5';
                    $rango_2_2 = ceil($hora_redondeo);

                    if($hora_redondeo>$rango_1 && $hora_redondeo<$rango_1_2){
                        $horas_auxa = $rango_1.'.'.$cinco;
                    }

                    if($hora_redondeo>=$rango_2 && $hora_redondeo<$rango_2_2){
                        $horas_auxa = ceil($hora_redondeo);
                    }
                    $horas_periodo = $hora_dia_aux*2;
                    return intval($horas_periodo);
                break;

                case 'A':
                    $horas_periodo = $hora_dia_aux;
                    return intval($horas_periodo);
                break;

                default:
                    # code...
                break;
            }
     }

   public function total_dias_periodo($dias_aux,$periodo){
                switch ($periodo) {
                case 'T':
                    $dias_periodo = $dias_aux*4;

                    return $dias_periodo;
                break;

                case 'S':
                    $dias_periodo = $dias_aux*2;

                    return $dias_periodo;
                break;

                case 'A':
                    $dias_periodo = $dias_aux;
                    return $dias_periodo;
                break;

                default:
                    # code...
                break;
            }
   }

   public function total_idas_periodo($idas_ajustados_aux,$periodo){
                switch ($periodo) {
                case 'T':

                    $ida_redondeo = floor($idas_ajustados_aux * 10) / 10;  // Mostrar solo un decimal
                    $ida_primer_numero = explode('.',$ida_redondeo);
                    $cinco = 5;
                    $rango_1 = $ida_primer_numero[0];
                    $rango_1_2 = $ida_primer_numero[0].'.5';
                    $rango_2 = $ida_primer_numero[0].'.5';
                    $rango_2_2 = ceil($ida_redondeo);

                    if($ida_redondeo>floatval($rango_1) && $ida_redondeo <= floatval($rango_1_2) || $ida_redondeo == floatval($rango_1_2)){
                        $idas_auxa = $rango_1.'.'.$cinco;
                    }

                    if($ida_redondeo >= floatval($rango_2) && $ida_redondeo <=  floatval($rango_2_2) || $ida_redondeo == floatval($rango_2_2)){
                        $idas_auxa = ceil($ida_redondeo);
                    }
                    //dd($ida_redondeo."_".$rango_1."_".$rango_1_2."_".$rango_2."_".$rango_2_2);
                    $idas_ajustados_periodo = $idas_auxa*4;

                    return $idas_ajustados_periodo;
                break;

                case 'S':

                    $ida_redondeo = floor($idas_ajustados_aux * 10) / 10;
                    $ida_primer_numero = explode('.',$ida_redondeo);
                    $cinco = 5;
                    $rango_1 = $ida_primer_numero[0];
                    $rango_1_2 = $ida_primer_numero[0].'.5';
                    $rango_2 = $ida_primer_numero[0].'.5';
                    $rango_2_2 = ceil($ida_redondeo);

                    if($ida_redondeo > floatval($rango_1) && $ida_redondeo< $rango_1_2){
                        $idas_auxa = $rango_1.'.'.$cinco;
                    }

                    if($ida_redondeo >= floatval($rango_2) && $ida_redondeo < floatval($rango_2_2)){
                        $idas_auxa = ceil($ida_redondeo);
                    }

                    $idas_ajustados_periodo = $idas_auxa*2;
                    return $idas_ajustados_periodo;
                break;

                case 'A':
                    $idas_ajustados_periodo = $idas_ajustados_aux;
                    return $idas_ajustados_periodo;
                break;

                default:
                    # code...
                break;
            }
   }

   public function save_mantenimiento_project(Request $request){

         $mew_project = new ProjectsModel;


            $mew_project->type_p= 3;

            $pais = DB::table('pais')
            ->where('pais.idPais','=',$request->values['paises_mantenimiento'])
            ->first()->pais;

            $ciudad = DB::table('ciudad')
            ->where('ciudad.idCiudad','=',$request->values['ciudades_mantenimiento'])
            ->first()->ciudad;

            $mew_project->region=$pais;
            $mew_project->ciudad=$ciudad;
            $mew_project->id_tipo_edificio=$request->values['tipo_edificio_mantenimiento'];
            $mew_project->id_cat_edifico=$request->values['cat_edi_mantenimiento'];
            $cap_tot_ar_mant =$this->num_form($request->values['ar_project_mantenimiento']);
            $mew_project->area = floatval($cap_tot_ar_mant);

            $aux_porcent = explode("%", $request->values['porcent_hvac_mantenimiento']);
            if(count($aux_porcent) == 2){
                $mew_project->porcent_hvac=intval($aux_porcent[0]);
            }else{
                $mew_project->porcent_hvac=10;
            }

            $mew_project->status=1;
            $mew_project->id_empresa=Auth::user()->id_empresa;
            $mew_project->id_user=Auth::user()->id;

        $mew_project->save();

        if( $mew_project->save()){


            $calculoMantenimientoService = new CalculoMantenimientoService();

            $mantenimiento =  $calculoMantenimientoService->new_calculo_mantenimiento_save($request,$mew_project->id);
                if($mantenimiento ==  true){
                    Session::forget('array_sistemas');
                    Session::forget('array_speed_plan');
                }


            //$solutions = $solutionService->CreateSolutions($request,$mew_project->id);

            return $mew_project->id;
        }
   }

   public function redondeo_dias($dias){
                    $dias_redondeo = floor($dias * 10) / 10;  // Mostrar solo un decimal
                    $dia_primer_numero = explode('.',$dias_redondeo);
                    $cinco = 5;
                    $rango_1 = $dia_primer_numero[0];

                    $rango_1_2 = $dia_primer_numero[0].'.5';
                    $rango_2 = $dia_primer_numero[0].'.5';
                    $rango_2_2 = ceil($dias_redondeo);

                    if($dias_redondeo>$rango_1 && $dias_redondeo<$rango_1_2){
                        $dias_auxa = $rango_1.'.'.$cinco;
                    }

                    if($dias_redondeo>=$rango_2 && $dias_redondeo<$rango_2_2){
                        $dias_auxa = ceil($dias_redondeo);
                    }

                   return $dias_auxa;

   }

}

