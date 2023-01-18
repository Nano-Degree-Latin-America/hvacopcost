<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
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

    }

    public function check_user(Request $request)
    {
        if (Auth::user()->tipo_user==5 && Auth::user()->status==1) {
            return view('index');
        }else if(Auth::user()->tipo_user==1 && Auth::user()->status==1){
            return view('index');
        }else if(Auth::user()->tipo_user==2 && Auth::user()->status==1){
            return view('index');
        }else if(Auth::user()->tipo_user==3 && Auth::user()->status==2){
            Auth::logout();
            return redirect('/');
        }else{
            Auth::logout();
            return redirect('/');
        }
    }

    public function getPaises(Request $request)
    {
        $submit = DB::table('pais')
        ->orderBy('pais', 'asc')
        ->get();

        return response()->json($submit);
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
}
