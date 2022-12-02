<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use Illuminate\Support\Facades\Redirect;
class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function solutions($id){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->get();

        return $solutions;
    }

    public function categories_paieses(){
        $cat_edif = DB::table('categorias_edificios')
        ->where('categorias_edificios.status','=',1)
        ->get();

        return $cat_edif;
    }

    public function get_cat_edi($id){
        $tipo_edif = DB::table('tipo_edificio')
        ->where('tipo_edificio.id_categoria','=',$id)
        ->where('tipo_edificio.status','=',1)
        ->get();

        return $tipo_edif;
    }

    public function mis_projectos(){
        $id_empresa = Auth::user()->id_empresa;

        $mis_projectos = DB::table('projects')
        ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
        ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
        ->where('id_empresa','=',$id_empresa)
        ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
        ->paginate(10);

        return view('mis_projectos',['id_empresa'=>$id_empresa,'mis_projectos'=>$mis_projectos]);
    }

    public function porcents_aux($id){
        $porcent_hvac = DB::table('porcent_hvac')
        ->where('porcent_hvac.id_cat_edi','=',$id)
        ->first();

        $arry = [];
        for ($i=0; $i <= 3; $i++) {
            if ($i==1) {
                array_push($arry,$porcent_hvac->porcent_1);
            }

            if ($i==2) {
                array_push($arry,$porcent_hvac->porcent_2);
            }

            if ($i==3) {
                array_push($arry,$porcent_hvac->porcent_3);
            }
        }

        return $arry;

    }

    public function get_ciudades($pais){
        $id_pais = DB::table('pais')
        ->where('pais','=',$pais)
        ->first()->idPais;

        $ciudades = DB::table('ciudad')
        ->where('ciudad.idPais','=',$id_pais)
        ->get();

        return $ciudades;
    }

    public function get_ciudades_Edit($id){


        $ciudades = DB::table('ciudad')
        ->where('ciudad.idPais','=',$id)
        ->get();

        return $ciudades;
    }



}
