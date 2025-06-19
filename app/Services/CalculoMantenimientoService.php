<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use App\AdicionalesModel;
use App\MantenimientoEquiposModel;
use App\AnalisisCostosOperativosModel;
use App\MantenimientoProjectsModel;
use App\SistemasModel;
use App\UnidadesModel;
use App\FactorAccesoModel;
use App\FactorEstadoUnidad;
use App\Http\Controllers\MantenimientoController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use funciones\funciones;

class CalculoMantenimientoService
{
    public function new_calculo_mantenimiento_save(Request $request,$id_project)
    {


        //dd($request->all());


        //guardar_aquipos manyenimiento
        $array_sistemas = Session::get('array_sistemas', []);

        for ($i = 0; $i < count($array_sistemas); $i++) {

            $id_sistema = SistemasModel::where('name','=',$array_sistemas[$i][1])->first()->id;
            $unidad = UnidadesModel::where('unidad','=',$array_sistemas[$i][2])->first()->identificador;

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
            $costo_filtros_price = $this->precio_to_integer($costo_filtros_aux[0]);

            $cantidad_filtros_aux = explode('_', $array_sistemas[$i][13]);
            $cantidad_filtros = $cantidad_filtros_aux[0];

            $costo_total_filtros_aux = explode('_hidden', $array_sistemas[$i][15]);
            $costo_total_filtros = $costo_total_filtros_aux[0];

            $total_horas_aux = explode('_hidden', $array_sistemas[$i][18]);
            $total_horas = $total_horas_aux[0];

            $hora_dia_aux = explode('_hidden', $array_sistemas[$i][19]);
            $hora_dia = $hora_dia_aux[0];

            $dias_aux = explode('_hidden', $array_sistemas[$i][20]);
            $dias = $dias_aux[0];

            $idas_ajustados_aux = explode('_hidden', $array_sistemas[$i][21]);
            $idas_ajustados = $idas_ajustados_aux[0];

            $new_equipo_mantenimiento = new MantenimientoEquiposModel;
            $new_equipo_mantenimiento->id_project =$id_project;;
            $new_equipo_mantenimiento->sistema = $id_sistema;
            $new_equipo_mantenimiento->unidad = $unidad;
            $new_equipo_mantenimiento->id_marca = $marca;
            $new_equipo_mantenimiento->id_modelo = $modelo;
            $new_equipo_mantenimiento->yrs_life = $array_sistemas[$i][7];
            $new_equipo_mantenimiento->capacidad = $array_sistemas[$i][5];
            $new_equipo_mantenimiento->capacidad_unidad = 'TR';
            $new_equipo_mantenimiento->hrs_diarias = $horas_diarias;
            $new_equipo_mantenimiento->acceso = $acceso;
            $new_equipo_mantenimiento->estado_unidad = $estado;
            $new_equipo_mantenimiento->cambio_filtros = $cambio_filtros;
            $new_equipo_mantenimiento->costo_cambio_filtros = $costo_filtros_price;
            $new_equipo_mantenimiento->costo_total_filtros = $costo_total_filtros;
            $new_equipo_mantenimiento->cantidad = $array_sistemas[$i][6];
            $new_equipo_mantenimiento->cambios_anuales = $cantidad_filtros;
            $new_equipo_mantenimiento->total_horas = $total_horas;
            $new_equipo_mantenimiento->hora_dia = $hora_dia;
            $new_equipo_mantenimiento->dias = $dias;
            $new_equipo_mantenimiento->idas_ajustados = $idas_ajustados;
            $new_equipo_mantenimiento->id_empresa = Auth::user()->id_empresa;
            $new_equipo_mantenimiento->save();
        }


                $new_mantenimiento_project = new MantenimientoProjectsModel;
                $new_mantenimiento_project->id_project=$id_project;
                $new_mantenimiento_project->cliente_prospecto=$request->values['cliente_pro_mantenimiento'];
                $new_mantenimiento_project->nombre_propiedad=$request->values['name_sitio_mantenimiento'];
                $new_mantenimiento_project_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
                $new_mantenimiento_project->distancia_sitio=$new_mantenimiento_project_aux[0];
                $new_mantenimiento_project->velocidad=$request->values['velocidad_promedio_mantenimiento'];
                $new_mantenimiento_project->yrs_edificio=$request->values['yrs_vida_mantenimiento'];
                $new_mantenimiento_project->ocupacion_semanal=$request->values['ocupacion_semanal_mantenimiento'];
                $new_mantenimiento_project->medio_ambiente=$request->values['tipo_ambiente_mantenimiento'];
                $new_mantenimiento_project->personal_enviado=$request->values['personal_enviado_mantenimiento'];
                $porcent_mantenimiento_aux = explode('%',$request->values['inflacion_mantenimiento']);
                $new_mantenimiento_project->porcent_inflacion=$porcent_mantenimiento_aux[0];
                $new_mantenimiento_project->type_mant=1;
                $new_mantenimiento_project->save();


                    // si se guardda el proyecto de mantenimiento se guarda la mano de obra
                    if($new_mantenimiento_project->save()){

                    return true;
                        ///guardar adicionales
                       /*  $new_mano_obra_hora = new AdicionalesModel;
                        $new_mano_obra_hora->id_project=$id_project;
                        $new_mano_obra_hora->servicios_emergencias=$request->get('servicio_emergencias_adicionales');
                        $new_mano_obra_hora->tipo_adicional_accesos=$request->get('tiempo_adicional_accesos_adicionales');
                        $new_mano_obra_hora->curso_seguridad_otros=$request->get('curso_seguridad_otros_adicionales');
                        $new_mano_obra_hora->lavado_filtros_aire=$request->get('lavado_filtros_aire_adicionales');
                        $new_mano_obra_hora->lavado_evaporadores=$request->get('lavado_evaporadores_adicionales');
                        $new_mano_obra_hora->lavado_extra_condensadores=$request->get('lavado_extra_condensadores_adicionales');
                        $new_mano_obra_hora->lavado_ventiladores=$request->get('lavado_ventiladores_adicionales');
                        $new_mano_obra_hora->limpieza_grasa=$request->get('limpieza_grasa_adicionales');
                        $new_mano_obra_hora->seguristas_supervicion=$request->get('seguristas_supervicion_adicionales');


                        $new_mano_obra_hora->costos_filtros_aire= $this->precio_to_integer($request->get('costos_filtro_aire_adicionales'));


                        $new_mano_obra_hora->filtros_adicionales=$this->precio_to_integer($request->get('filtro_adicionales_adicionales'));

                        $new_mano_obra_hora->refacciones_basicas=$this->precio_to_integer($request->get('refacciones_basicas_adicionales'));

                        $new_mano_obra_hora->filtros_aceite_chiller=$this->precio_to_integer($request->get('filtro_aceite_chiller_adicionales'));

                        $new_mano_obra_hora->filtros_secador_chiller=$this->precio_to_integer($request->get('filtro_secador_chiller_adicionales'));

                        $new_mano_obra_hora->andamos_gruas_etc=$this->precio_to_integer($request->get('andamios_gruas_adicionales'));

                        $new_mano_obra_hora->viaticos=$this->precio_to_integer($request->get('viaticos_adicionales'));

                        $new_mano_obra_hora->contratistas=$this->precio_to_integer($request->get('contratistas_adicionales'));

                        $new_mano_obra_hora->pruebas_acidez_basica=$this->precio_to_integer($request->get('pruebas_acidez_basica_adicionales'));

                        $new_mano_obra_hora->pruebas_aceite_laboratorio=$this->precio_to_integer($request->get('pruebas_aceite_laboratorio_adicionales'));

                        $new_mano_obra_hora->pruebas_refirgerante=$this->precio_to_integer($request->get('pruebas_refrigerante_adicionales'));

                        $new_mano_obra_hora->eddy_current_test=$this->precio_to_integer($request->get('eddy_current_test_adicionales'));

                        $new_mano_obra_hora->limpieza_evaporador_chiller=$this->precio_to_integer($request->get('limpieza_evaporador_chiller_adicionales'));

                        $new_mano_obra_hora->limpieza_condensador_agua=$this->precio_to_integer($request->get('limpeza_condenzador_agua_adicionales'));

                        $new_mano_obra_hora->cambio_aceite_chillers=$this->precio_to_integer($request->get('cambio_aceite_chillers_adicionales'));

                        $new_mano_obra_hora->limpieza_anual_torres_enf=$this->precio_to_integer($request->get('limpieza_anual_torres_adicionales'));

                        $new_mano_obra_hora->costo_estimado_hvac=$this->precio_to_integer($request->get('costo_estimado_sistema_hvac'));

                        $new_mano_obra_hora->save();


                         ///guardar analisis de costos operativos

                         $new_analisis_costos_operativos = new AnalisisCostosOperativosModel;
                         $new_analisis_costos_operativos->id_project=$id_project;

                         $new_analisis_costos_operativos->consumo_anual_edificio=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento'));

                         $new_analisis_costos_operativos->eui=$request->get('eui_mantenimiento');

                         $new_analisis_costos_operativos->estandar_ashrae=$request->get('estandar_ashrae_checked');

                         $new_analisis_costos_operativos->filtros_merv_7=$request->get('filtros_merv_checked');

                         $new_analisis_costos_operativos->remplazo_filtros=$request->get('remplazo_filtros_checked');

                         $new_analisis_costos_operativos->mantenimiento_proactivo=$request->get('mant_preven_checked');

                         $new_analisis_costos_operativos->consumo_anual_edificio_futura=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento_financiero'));

                         $new_analisis_costos_operativos->reduccion_energetica=$this->precio_to_integer($request->get('reduccion_energetica_mantenimiento_financiero'));

                         $new_analisis_costos_operativos->costo_reparaciones=$this->precio_to_integer($request->get('monto_actual_mantenimiento_financiero'));

                         $new_analisis_costos_operativos->reduccion_reparaciones=$this->precio_to_integer($request->get('reduccion_reparaciones_mantenimiento_financiero'));

                         $new_analisis_costos_operativos->costo_mantenimiento=$this->precio_to_integer($request->get('costo_mantenimiento_mantenimiento_financiero'));

                         $new_analisis_costos_operativos->id_empresa = Auth::user()->id_empresa;

                         $new_analisis_costos_operativos->save(); */



                    }

                }


                public function update_calculo_mantenimiento_update(Request $request,$id_project){

                    $id_mantenimiento_project = MantenimientoProjectsModel::where('id_project','=',$id_project)->first()->id;

                    $update_mantenimiento_project = MantenimientoProjectsModel::find($id_mantenimiento_project);
                    $update_mantenimiento_project->id_project=$id_project;
                    $update_mantenimiento_project->cliente_prospecto=$request->values['cliente_pro_mantenimiento'];
                    $update_mantenimiento_project->nombre_propiedad=$request->values['name_sitio_mantenimiento'];
                    $update_mantenimiento_project_aux = explode('kms',$request->values['distancia_sitio_mantenimiento']);
                    $update_mantenimiento_project->distancia_sitio=$update_mantenimiento_project_aux[0];
                    $update_mantenimiento_project->velocidad=$request->values['velocidad_promedio_mantenimiento'];
                    $update_mantenimiento_project->yrs_edificio=$request->values['yrs_vida_mantenimiento'];
                    $update_mantenimiento_project->ocupacion_semanal=$request->values['ocupacion_semanal_mantenimiento'];
                    $update_mantenimiento_project->medio_ambiente=$request->values['tipo_ambiente_mantenimiento'];
                    $update_mantenimiento_project->personal_enviado=$request->values['personal_enviado_mantenimiento'];
                    $porcent_mantenimiento_aux = explode('%',$request->values['inflacion_mantenimiento']);
                    $update_mantenimiento_project->porcent_inflacion=$porcent_mantenimiento_aux[0];
                    $update_mantenimiento_project->type_mant=1;
                    $update_mantenimiento_project->update();


                        // si se guardda el proyecto de mantenimiento se guarda la mano de obra
                        /* if($update_mantenimiento_project->update()){


                            ///guardar adicionales
                            $id_adicionales = AdicionalesModel::where('id_project','=',$id_project)->first()->id;
                            $update_mano_obra_hora = AdicionalesModel::find($id_adicionales);
                            $update_mano_obra_hora->id_project=$id_project;
                            $update_mano_obra_hora->servicios_emergencias=$request->get('servicio_emergencias_adicionales');
                            $update_mano_obra_hora->tipo_adicional_accesos=$request->get('tiempo_adicional_accesos_adicionales');
                            $update_mano_obra_hora->curso_seguridad_otros=$request->get('curso_seguridad_otros_adicionales');
                            $update_mano_obra_hora->lavado_filtros_aire=$request->get('lavado_filtros_aire_adicionales');
                            $update_mano_obra_hora->lavado_evaporadores=$request->get('lavado_evaporadores_adicionales');
                            $update_mano_obra_hora->lavado_extra_condensadores=$request->get('lavado_extra_condensadores_adicionales');
                            $update_mano_obra_hora->lavado_ventiladores=$request->get('lavado_ventiladores_adicionales');
                            $update_mano_obra_hora->limpieza_grasa=$request->get('limpieza_grasa_adicionales');
                            $update_mano_obra_hora->seguristas_supervicion=$request->get('seguristas_supervicion_adicionales');


                            $update_mano_obra_hora->costos_filtros_aire= $this->precio_to_integer($request->get('costos_filtro_aire_adicionales'));


                            $update_mano_obra_hora->filtros_adicionales=$this->precio_to_integer($request->get('filtro_adicionales_adicionales'));

                            $update_mano_obra_hora->refacciones_basicas=$this->precio_to_integer($request->get('refacciones_basicas_adicionales'));

                            $update_mano_obra_hora->filtros_aceite_chiller=$this->precio_to_integer($request->get('filtro_aceite_chiller_adicionales'));

                            $update_mano_obra_hora->filtros_secador_chiller=$this->precio_to_integer($request->get('filtro_secador_chiller_adicionales'));

                            $update_mano_obra_hora->andamos_gruas_etc=$this->precio_to_integer($request->get('andamios_gruas_adicionales'));

                            $update_mano_obra_hora->viaticos=$this->precio_to_integer($request->get('viaticos_adicionales'));

                            $update_mano_obra_hora->contratistas=$this->precio_to_integer($request->get('contratistas_adicionales'));

                            $update_mano_obra_hora->pruebas_acidez_basica=$this->precio_to_integer($request->get('pruebas_acidez_basica_adicionales'));

                            $update_mano_obra_hora->pruebas_aceite_laboratorio=$this->precio_to_integer($request->get('pruebas_aceite_laboratorio_adicionales'));

                            $update_mano_obra_hora->pruebas_refirgerante=$this->precio_to_integer($request->get('pruebas_refrigerante_adicionales'));

                            $update_mano_obra_hora->eddy_current_test=$this->precio_to_integer($request->get('eddy_current_test_adicionales'));

                            $update_mano_obra_hora->limpieza_evaporador_chiller=$this->precio_to_integer($request->get('limpieza_evaporador_chiller_adicionales'));

                            $update_mano_obra_hora->limpieza_condensador_agua=$this->precio_to_integer($request->get('limpeza_condenzador_agua_adicionales'));

                            $update_mano_obra_hora->cambio_aceite_chillers=$this->precio_to_integer($request->get('cambio_aceite_chillers_adicionales'));

                            $update_mano_obra_hora->limpieza_anual_torres_enf=$this->precio_to_integer($request->get('limpieza_anual_torres_adicionales'));

                            $update_mano_obra_hora->costo_estimado_hvac=$this->precio_to_integer($request->get('costo_estimado_sistema_hvac'));

                            $update_mano_obra_hora->update();


                             ///guardar analisis de costos operativos

                            $id_analisis_costos_operativos = AnalisisCostosOperativosModel::where('id_project','=',$id_project)->first()->id;

                             $upadte_analisis_costos_operativos = AnalisisCostosOperativosModel::find($id_analisis_costos_operativos);
                             $upadte_analisis_costos_operativos->id_project=$id_project;

                             $upadte_analisis_costos_operativos->consumo_anual_edificio=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento'));

                             $upadte_analisis_costos_operativos->eui=$request->get('eui_mantenimiento');

                             $upadte_analisis_costos_operativos->estandar_ashrae=$request->get('estandar_ashrae_checked');

                             $upadte_analisis_costos_operativos->filtros_merv_7=$request->get('filtros_merv_checked');

                             $upadte_analisis_costos_operativos->remplazo_filtros=$request->get('remplazo_filtros_checked');

                             $upadte_analisis_costos_operativos->mantenimiento_proactivo=$request->get('mant_preven_checked');

                             $upadte_analisis_costos_operativos->consumo_anual_edificio_futura=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->reduccion_energetica=$this->precio_to_integer($request->get('reduccion_energetica_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->costo_reparaciones=$this->precio_to_integer($request->get('monto_actual_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->reduccion_reparaciones=$this->precio_to_integer($request->get('reduccion_reparaciones_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->costo_mantenimiento=$this->precio_to_integer($request->get('costo_mantenimiento_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->id_empresa = Auth::user()->id_empresa;

                             $upadte_analisis_costos_operativos->update();


                            return true;
                        } */
                }

                public function  save_adicionales(Request $request,$id_project){
                            $id_adicionales = AdicionalesModel::where('id_project','=',$id_project)->first();

                            if($id_adicionales){
                                $update_mano_obra_hora = AdicionalesModel::find($id_adicionales->id);
                            }else{
                                $update_mano_obra_hora = new AdicionalesModel();
                            }


                            $update_mano_obra_hora->id_project=$id_project;
                            $update_mano_obra_hora->servicios_emergencias=$request->values['servicio_emergencias_adicionales'];
                            $update_mano_obra_hora->tipo_adicional_accesos=$request->values['tiempo_adicional_accesos_adicionales'];
                            $update_mano_obra_hora->curso_seguridad_otros=$request->values['curso_seguridad_otros_adicionales'];
                            $update_mano_obra_hora->lavado_filtros_aire=$request->values['lavado_filtros_aire_adicionales'];
                            $update_mano_obra_hora->lavado_evaporadores=$request->values['lavado_evaporadores_adicionales'];
                            $update_mano_obra_hora->lavado_extra_condensadores=$request->values['lavado_extra_condensadores_adicionales'];
                            $update_mano_obra_hora->lavado_ventiladores=$request->values['lavado_ventiladores_adicionales'];
                            $update_mano_obra_hora->limpieza_grasa=$request->values['limpieza_grasa_adicionales'];
                            $update_mano_obra_hora->seguristas_supervicion=$request->values['seguristas_supervicion_adicionales'];


                            $update_mano_obra_hora->costos_filtros_aire= $this->precio_to_integer($request->values['costos_filtro_aire_adicionales']);

                            $update_mano_obra_hora->filtros_adicionales=$this->precio_to_integer($request->values['filtro_adicionales_adicionales']);

                            $update_mano_obra_hora->refacciones_basicas=$this->precio_to_integer($request->values['refacciones_basicas_adicionales']);

                            $update_mano_obra_hora->filtros_aceite_chiller=$this->precio_to_integer($request->values['filtro_aceite_chiller_adicionales']);

                            $update_mano_obra_hora->filtros_secador_chiller=$this->precio_to_integer($request->values['filtro_secador_chiller_adicionales']);

                            $update_mano_obra_hora->andamos_gruas_etc=$this->precio_to_integer($request->values['andamios_gruas_adicionales']);

                            $update_mano_obra_hora->viaticos=$this->precio_to_integer($request->values['viaticos_adicionales']);

                            $update_mano_obra_hora->contratistas=$this->precio_to_integer($request->values['contratistas_adicionales']);

                            $update_mano_obra_hora->pruebas_acidez_basica=$this->precio_to_integer($request->values['pruebas_acidez_basica_adicionales']);

                            $update_mano_obra_hora->pruebas_aceite_laboratorio=$this->precio_to_integer($request->values['pruebas_aceite_laboratorio_adicionales']);

                            $update_mano_obra_hora->pruebas_refirgerante=$this->precio_to_integer($request->values['pruebas_refrigerante_adicionales']);

                            $update_mano_obra_hora->eddy_current_test=$this->precio_to_integer($request->values['eddy_current_test_adicionales']);

                            $update_mano_obra_hora->limpieza_evaporador_chiller=$this->precio_to_integer($request->values['limpieza_evaporador_chiller_adicionales']);

                            $update_mano_obra_hora->limpieza_condensador_agua=$this->precio_to_integer($request->values['limpeza_condenzador_agua_adicionales']);

                            $update_mano_obra_hora->cambio_aceite_chillers=$this->precio_to_integer($request->values['cambio_aceite_chillers_adicionales']);

                            $update_mano_obra_hora->limpieza_anual_torres_enf=$this->precio_to_integer($request->values['limpieza_anual_torres_adicionales']);

                            $update_mano_obra_hora->costo_estimado_hvac=$this->precio_to_integer($request->values['costo_estimado_sistema_hvac']);


                            if($id_adicionales){
                                $update_mano_obra_hora->update();
                            }else{
                                $update_mano_obra_hora->save();
                            }

                             ///guardar analisis de costos operativos

                           /*  $id_analisis_costos_operativos = AnalisisCostosOperativosModel::where('id_project','=',$id_project)->first()->id;

                             $upadte_analisis_costos_operativos = AnalisisCostosOperativosModel::find($id_analisis_costos_operativos);
                             $upadte_analisis_costos_operativos->id_project=$id_project;

                             $upadte_analisis_costos_operativos->consumo_anual_edificio=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento'));

                             $upadte_analisis_costos_operativos->eui=$request->get('eui_mantenimiento');

                             $upadte_analisis_costos_operativos->estandar_ashrae=$request->get('estandar_ashrae_checked');

                             $upadte_analisis_costos_operativos->filtros_merv_7=$request->get('filtros_merv_checked');

                             $upadte_analisis_costos_operativos->remplazo_filtros=$request->get('remplazo_filtros_checked');

                             $upadte_analisis_costos_operativos->mantenimiento_proactivo=$request->get('mant_preven_checked');

                             $upadte_analisis_costos_operativos->consumo_anual_edificio_futura=$this->precio_to_integer($request->get('consumo_energia_edificio_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->reduccion_energetica=$this->precio_to_integer($request->get('reduccion_energetica_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->costo_reparaciones=$this->precio_to_integer($request->get('monto_actual_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->reduccion_reparaciones=$this->precio_to_integer($request->get('reduccion_reparaciones_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->costo_mantenimiento=$this->precio_to_integer($request->get('costo_mantenimiento_mantenimiento_financiero'));

                             $upadte_analisis_costos_operativos->id_empresa = Auth::user()->id_empresa;

                             $upadte_analisis_costos_operativos->update(); */


                            return true;
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

}
