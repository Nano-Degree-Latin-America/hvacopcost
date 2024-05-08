<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\MarcasEmpresaModel;

class MarcasController extends Controller
{
    public function __construct()
    {
       /*  $this->middleware('auth'); */
       $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request){
        $marcas = DB::table('marcas_empresa')
        ->orderBy('created_at','desc')
        ->get();

        return view('marcas.index', ['marcas' => $marcas]);
    }

    public function create(Request $request){


        return view('marcas.create');
    }

    public function store(Request $request){

        $marca = new MarcasEmpresaModel;
        $marca->marca = $request->get('marca');
        $marca->equipo = $request->get('cUnidad');
        $marca->id_user =Auth::user()->id;
        $marca->save();
        if ($marca->save()){

            return redirect('/marcas');


        }else{
            return false;
        }


    }

    public function edit($id)
    {

        $marca = DB::table('marcas_empresa')
        ->where('marcas_empresa.id','=',$id)
        ->first();

        $marcas = DB::table('marcas_empresa')
        ->get();
        return view('marcas.edit',['marca'=>$marca,'marcas'=>$marcas]);
    }

    public function update(Request $request, $id)
    {
        $marca = MarcasEmpresaModel::where('id',$id)->first();
        $marca->marca = $request->get('marca');
        $marca->equipo = $request->get('cUnidad');
        $marca->id_user =Auth::user()->id;
        $marca->update();
        if ($marca->update()){
            return redirect('marcas');
        }else{
            return false;
        }
    }

    public function delete_marcas($id)
    {
        $marca= MarcasEmpresaModel::find(intval($id));
        $marca->delete();
        return true;
    }

}
