<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
use App\User;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function check_user(Request $request)
    {

        if(Auth::check()){
            if (Auth::user()->tipo_user==5 && Auth::user()->status==1) {

                /* $user_update= User::find(Auth::user()->id);
                $user_update->id_empresa=11;
                $user_update->status=1;
                $user_update->update(); */

                return view('index');
            }else if(Auth::user()->tipo_user==1 && Auth::user()->status==1){
                return view('index');
            }else if(Auth::user()->tipo_user==2 && Auth::user()->status==1){
                return view('index');
            }else if(Auth::user()->tipo_user==3 && Auth::user()->status==1){
               /*  Auth::logout(); */
               return view('index');
                return redirect('/');
            }else{
                Auth::logout();
                return redirect('/');
            }
        }else{
            Auth::logout();
        }

    }

    public function cerrar_session(){
        $user = Auth::user()->tipo_user;
        if($user === 5){
            $user_update= User::find(Auth::user()->id);
            $user_update->id_empresa=9;
            $user_update->update();

            Auth::logout();
            return redirect('/');
        }else{
            Auth::logout();
            return redirect('/');
        }

    }

    public function getPaises()
    {
        $submit = DB::table('paises_empresas')
        ->join('pais','pais.pais','=','paises_empresas.pais')
        ->where('id_empresa','=',Auth::user()->id_empresa)
        ->select('pais.*')
        ->orderBy('pais.pais', 'asc')
        ->get();

        return $submit;
    }

    public function getPaises_aux()
    {
        $submit = DB::table('pais')
        ->orderBy('pais.pais', 'asc')
        ->get();

        return $submit;
    }

    public function all_paises(){
        $all_paises = DB::table('pais')
        ->orderBy('pais.pais', 'asc')
        ->get();

        return $all_paises;
    }

    public function usuario_pais(){
        $pais_user = DB::table('user_pais')
        ->where('user_pais.id_user','=',Auth::user()->id)
        ->first();

        return $pais_user;
    }

    public function check_pais($pais){
        $pais = DB::table('paises_empresas')
        ->where('paises_empresas.pais','=',$pais)
        ->where('paises_empresas.id_empresa','=',Auth::user()->id_empresa)
        ->first();

        return $pais;
    }

    public function getCiudades(Request $request)
    {
        $submit = DB::table('ciudad')
        ->where('idPais', $request->input('idPais'))
        ->where('ashrae','!=','')
        ->orderBy('ciudad', 'asc')
        ->get();

        return response()->json($submit);
    }
    public function getDegreeHrs(Request $request)
    {
        $submit = DB::table('ciudad_hrs_mes')
        ->where('idCiudad', $request->input('idCiudad'))
        ->get();

        return response()->json($submit);
    }

    public function getDegreeHrsadd($id)
    {
        /*$project_hrs_edit = DB::table('projects')
         ->where('id','=',$id)
        ->first();


        if($project_hrs_edit->created_at != $project_hrs_edit->updated_at){

         } */

         $hrs_edited = DB::table('solutions_project')
         ->where('id_project','=',$id)
         ->first()->coolings_hours;
         return $hrs_edited;

       /*  */
    }

    public function check_p_type_pn($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->p_n;
        }else{
            return false;
        }
    }

    public function check_p_type_pr($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->p_r;
        }else{
            return false;
        }
    }

    public function check_p_type_m($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->mant;
        }else{
            return false;
        }
    }

    public function check_date_2_0($id){

        $fecha_update_2_0 = strtotime('2024-07-12 00:00:00');

        $date_project = DB::table('projects')
       ->where('id','=',$id)
       ->first();

       $fecha_project = strtotime($date_project->created_at);

       if ($fecha_project < $fecha_update_2_0) {

            return response()->json($fecha_update_2_0);
        } else {
            return response()->json($fecha_project);
        }
    }




}
