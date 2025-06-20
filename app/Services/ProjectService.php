<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\SolutionService;
use App\Services\SolutionServiceRetrofit;
use App\Services\SolutionServiceEdit;
use App\Services\SolutionServiceEditRetro;
use App\Services\CalculoMantenimientoService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use App\MantenimientoProjectsModel;
use App\MantenimientoEquiposModel;
use Illuminate\Support\Facades\Redirect;
//use Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
use funciones\funciones;
use App\Controllerss\ResultadosController;
use App\Controllerss\ProjectController;
use App\Traits\FormusTrait;
use App\Traits\ConfortTrait;
use App\Traits\SaveResultsTrait;
use Illuminate\Support\Facades\Session;

class ProjectService
{

use FormusTrait,ConfortTrait,SaveResultsTrait;

    public function CreateProject(Request $request): ProjectsModel {

        $mew_project = new ProjectsModel;

        if($request->get('type_p') == 1 || $request->get('type_p') == 2){
            $mew_project->name=$request->get('name_pro');

            $mew_project->type_p= $request->get('type_p');
            $mew_project->inflacion_rate=intval($request->get('inflation_rate'));
            $mew_project->inflacion=intval($request->get('inc_ene'));
            $hrs_tiempo = $request->get('tiempo_porcent');
            $mew_project->id_tipo_edificio=$request->get('tipo_edificio');
            $mew_project->id_cat_edifico=$request->get('cat_ed');
            //horas tiempo
            switch ($hrs_tiempo) {
                case 'm_50':
                    //si llega m_50 el valor es igual a 30 que es menor que 50 Nota! puede ser cualquier numero menor que 50
                    $mew_project->hrs_tiempo=30;

                    break;
                case '51_167':
                    //si es de 51 a 157 , 80 esta entre el rango
                    $mew_project->hrs_tiempo=80;

                    break;
                case '168':
                    //si es igual a 168
                    $mew_project->hrs_tiempo=168;

                    break;
            }


            if($request->get('n_empleados') == ''){
                $mew_project->n_empleados = 0;
            }else if($request->get('n_empleados') != '' || $request->get('n_empleados') >= 0){
                $n_empleados_aux =$this->num_form($request->get('n_empleados'));
                $mew_project->n_empleados = $n_empleados_aux;
            }

            if($request->get('sal_an_prom') == ''){
                $mew_project->sal_an_prom = 0;
            }else if($request->get('sal_an_prom') != '' || $request->get('sal_an_prom') >= 0){
                $sal_an_prom_aux =$this->price_form($request->get('sal_an_prom'));
                $mew_project->sal_an_prom = $sal_an_prom_aux;
            }

            $mew_project->unidad=$request->get('unidad');
            $mew_project->region=$request->get('pais');
            $mew_project->ciudad=$request->get('ciudad');
            $cap_tot_ar =$this->num_form($request->get('ar_project'));
            $mew_project->area = floatval($cap_tot_ar);
        }



        $aux_porcent = explode("%",   $request->get('porcent_hvac'));
        if(count($aux_porcent) == 2){
            $mew_project->porcent_hvac=intval($aux_porcent[0]);
        }else{
            $mew_project->porcent_hvac=10;
        }




        if($request->get('type_p') == 3){
            $mew_project->type_p= $request->get('type_p');

            $pais = DB::table('pais')
            ->where('pais.idPais','=',$request->get('paises_mantenimiento'))
            ->first()->pais;

            $ciudad = DB::table('ciudad')
            ->where('ciudad.idCiudad','=',$request->get('ciudades_mantenimiento'))
            ->first()->ciudad;

            $mew_project->region=$pais;
            $mew_project->ciudad=$ciudad;
            $mew_project->id_tipo_edificio=$request->get('tipo_edificio_mantenimiento');
            $mew_project->id_cat_edifico=$request->get('cat_edi_mantenimiento');
            $cap_tot_ar_mant =$this->num_form($request->get('ar_project_mantenimiento'));
            $mew_project->area = floatval($cap_tot_ar_mant);
        }


        $mew_project->status=1;
        $mew_project->id_empresa=Auth::user()->id_empresa;
        $mew_project->id_user=Auth::user()->id;

        $mew_project->save();

        if( $mew_project->save()){

            $solutionService = new SolutionService();
            $solutionServiceRetrofit = new SolutionServiceRetrofit();
            $calculoMantenimientoService = new CalculoMantenimientoService();

            $type_p = intval($request->get('type_p'));

            if($type_p === 1){
                //$sal_an_prom_aux = SolutionService::new_project_save($request,$mew_project->id);
                $solutions = $solutionService->new_project_save($request,$mew_project->id);
            }

            if($type_p == 2){
                $solutions = $solutionServiceRetrofit->new_project_save_retrofit($request,$mew_project->id);
            }

            if($type_p == 3){
                $mantenimiento =  $calculoMantenimientoService->new_calculo_mantenimiento_save($request,$mew_project->id);
                if($mantenimiento ==  true){
                    Session::forget('array_sistemas');
                    Session::forget('array_speed_plan');
                }

            }
            //$solutions = $solutionService->CreateSolutions($request,$mew_project->id);

            $project = $mew_project;
            return $mew_project;
        }


    }

    public function udpate_project(Request $request,$id): ProjectsModel {



        $type_project_check = ProjectsModel::find($id)->type_p;
        $type_project_modify=$request->get('type_p');
        $action_submit_send = $request->get('action_submit_send');
        $solutionServiceEdit = new SolutionServiceEdit();
        ////limpiar proyecto si es diferente
        if($type_project_check == $type_project_modify){

        }else{
            if($type_project_modify == 1 || $type_project_modify == 2){
                    if($type_project_check == 1 || $type_project_check == 2){
                        if($action_submit_send == 'store'){
                         //elimina soluciones
                        $del_functions = $solutionServiceEdit->del_solutions($id);
                        }else if($action_submit_send == 'update'){
                            //nada
                        }
                    }

                     if($type_project_check == 3){
                       if($action_submit_send == 'store'){
                         //elimina soluciones

                        $del_functions = $solutionServiceEdit->del_ventas_regis($id);

                        }else if($action_submit_send == 'update'){
                            //nada
                        }

                     }
            }
        }
        //actualizar project informaicon
            $update_project= ProjectsModel::find($id);
            if($type_project_modify == 1 || $type_project_modify == 2){


                    $update_project->type_p= $request->get('type_p');
                    $update_project->name=$request->get('name_pro');
                    $update_project->id_tipo_edificio=$request->get('tipo_edificio_edit');
                    $update_project->inflacion=intval($request->get('inc_ene'));
                    $update_project->inflacion_rate=intval($request->get('inflation_rate'));

                    if($request->get('n_empleados') == ''){
                        $update_project->n_empleados = 0;
                    }else if($request->get('n_empleados') != '' || $request->get('n_empleados') >= 0){
                        $n_empleados_aux = $this->num_form($request->get('n_empleados'));
                        $update_project->n_empleados = $n_empleados_aux;
                    }

                    if($request->get('sal_an_prom') == ''){
                        $update_project->sal_an_prom = 0;
                    }else if($request->get('sal_an_prom') != '' || $request->get('sal_an_prom') >= 0){
                        $sal_an_prom_aux = $this->price_form($request->get('sal_an_prom'));
                        $update_project->sal_an_prom = $sal_an_prom_aux;
                    }

                    $hrs_tiempo = $request->get('tiempo_porcent');

                    switch ($hrs_tiempo) {
                        case 'm_50':
                            //si llega m_50 el valor es igual a 30 que es menor que 50 Nota! puede ser cualquier numero menor que 50
                            $update_project->hrs_tiempo=30;

                            break;
                        case '51_167':
                            //si es de 51 a 157 , 80 esta entre el rango
                            $update_project->hrs_tiempo=80;

                            break;
                        case '168':
                            //si es igual a 168
                            $update_project->hrs_tiempo=168;

                            break;
                    }



                    $update_project->id_cat_edifico=$request->get('cat_ed_edit');

                    $cap_tot_ar = $this->num_form($request->get('ar_project'));
                    $update_project->area = floatval($cap_tot_ar);
                    $update_project->unidad=$request->get('unidad');
                    $pais = DB::table('pais')
                    ->where('pais.idPais','=',$request->get('paises_edit'))
                    ->first()->pais;
                    $update_project->region=$pais;
                    $region = DB::table('ciudad')
                    ->where('ciudad.idCiudad','=',$request->get('ciudades_edit'))
                    ->first()->ciudad;

                    $update_project->ciudad=$region;

                    $aux_porcent = explode("%",   $request->get('porcent_hvac'));
                    if(count($aux_porcent) == 2){
                        $update_project->porcent_hvac=intval($aux_porcent[0]);
                    }else{
                        $update_project->porcent_hvac=10;
                    }
                    $update_project->status=1;
                    $update_project->id_empresa=Auth::user()->id_empresa;
                    $update_project->id_user=Auth::user()->id;
            }

            if($type_project_modify == 3){
                $update_project->type_p= $request->get('type_p');

                $pais = DB::table('pais')
                ->where('pais.idPais','=',$request->get('paises_mantenimiento'))
                ->first()->pais;

                $ciudad = DB::table('ciudad')
                ->where('ciudad.idCiudad','=',$request->get('ciudades_mantenimiento'))
                ->first()->ciudad;

                $update_project->region=$pais;
                $update_project->ciudad=$ciudad;
                $update_project->id_tipo_edificio=$request->get('tipo_edificio_mantenimiento');
                $update_project->id_cat_edifico=$request->get('cat_edi_mantenimiento');
                $cap_tot_ar_mant =$this->num_form($request->get('ar_project_mantenimiento'));
                $update_project->area = floatval($cap_tot_ar_mant);
            }


        $update_project->update();
        if($update_project->update()){
            $type_p = intval($request->get('type_p'));
            $solutionServiceEdit = new SolutionServiceEdit();
            $SolutionServiceEditRetro = new SolutionServiceEditRetro();
            $calculoMantenimientoService = new CalculoMantenimientoService();

            if($type_p === 1){
                $solutions = $solutionServiceEdit->solution_update_new($request,$update_project->id);
            }

            if($type_p === 2){
                $solutions = $SolutionServiceEditRetro->solution_update_retro($request,$update_project->id);
            }

            if($type_p == 3){
                $mantenimiento =  $calculoMantenimientoService->update_calculo_mantenimiento_update($request,$update_project->id);
                if($mantenimiento ==  true){
                    Session::forget('array_sistemas');
                    Session::forget('array_speed_plan');
                }

            }

            $project = $update_project;
            return $update_project;
        }

    }



}

?>
