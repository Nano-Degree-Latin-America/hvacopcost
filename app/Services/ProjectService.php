<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use DB;
use App\Services\SolutionService;
use App\Services\SolutionServiceRetrofit;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use Illuminate\Support\Facades\Redirect;
//use Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
use funciones\funciones;
use App\Controllerss\ResultadosController;

class ProjectService
{

    public function CreateProject(Request $request): ProjectsModel {
        $funciones = new funciones();

        $mew_project = new ProjectsModel;
        $mew_project->name=$request->get('name_pro');
        $mew_project->type_p= $request->get('type_p');
        $mew_project->id_tipo_edificio=$request->get('tipo_edificio');
        $mew_project->id_cat_edifico=$request->get('cat_ed');
        $mew_project->inflacion_rate=intval($request->get('inflation_rate'));
        $mew_project->inflacion=intval($request->get('inc_ene'));
        $hrs_tiempo = $request->get('tiempo_porcent');
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


        $cap_tot_ar =$funciones->num_form($request->get('ar_project'));
        $mew_project->area = floatval($cap_tot_ar);
        $mew_project->unidad=$request->get('unidad');
        $mew_project->region=$request->get('pais');
        $mew_project->ciudad=$request->get('ciudad');

        $aux_porcent = explode("%",   $request->get('porcent_hvac'));
        if(count($aux_porcent) == 2){
            $mew_project->porcent_hvac=intval($aux_porcent[0]);
        }else{
            $mew_project->porcent_hvac=10;
        }

        if($request->get('n_empleados') == ''){
            $mew_project->n_empleados = 0;
        }else if($request->get('n_empleados') != '' || $request->get('n_empleados') >= 0){
            $n_empleados_aux =$funciones->num_form($request->get('n_empleados'));
            $mew_project->n_empleados = $n_empleados_aux;
        }

        if($request->get('sal_an_prom') == ''){
            $mew_project->sal_an_prom = 0;
        }else if($request->get('sal_an_prom') != '' || $request->get('sal_an_prom') >= 0){
            $sal_an_prom_aux =$funciones->price_form($request->get('sal_an_prom'));
            $mew_project->sal_an_prom = $sal_an_prom_aux;
        }

        $mew_project->status=1;
        $mew_project->id_empresa=Auth::user()->id_empresa;
        $mew_project->id_user=Auth::user()->id;
        $mew_project->save();

        if( $mew_project->save()){
            $solutionService = new SolutionService();
            $solutionServiceRetrofit = new SolutionServiceRetrofit();
            $type_p = intval($request->get('type_p'));

            if($type_p === 1){
                //$sal_an_prom_aux = SolutionService::new_project_save($request,$mew_project->id);
                $solutions = $solutionService->new_project_save($request,$mew_project->id);
            }

            if($type_p == 2){
                $solutions = $solutionServiceRetrofit->new_project_save_retrofit($request,$mew_project->id);
            }
            //$solutions = $solutionService->CreateSolutions($request,$mew_project->id);

            $project = $mew_project;
            return $mew_project;
        }


    }



}

?>
