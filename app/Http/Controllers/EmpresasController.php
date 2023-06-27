<?php

namespace App\Http\Controllers;
use DateTime;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\EmpresasModel;
use App\PaisesEmpresasModel;
use App\ResultsProjectModel;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\SucursalesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
class EmpresasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empresas = DB::table('empresas')
        ->join('users','users.id','=','empresas.id_user')
        ->select('empresas.*','users.name as name_user')
        ->orderBy('created_at','desc')
        ->paginate(10);

        $empresa_admin  = DB::table('empresas')
        ->where('empresas.id','=',Auth::user()->id_empresa)
        ->first()->name;

        return view('empresas.index',["empresas"=>$empresas,"empresa_admin"=>$empresa_admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa_p = new EmpresasModel;
        $empresa_p->name = $request->get('nombre');
        $empresa_p->email = $request->get('email');
        $empresa_p->contacto = $request->get('contacto');
        $empresa_p->direccion = $request->get('direccion');
        $empresa_p->telefono = $request->get('telefono');
        $empresa_p->direccion =$request->get('direccion');
        $empresa_p->codigo_postal = $request->get('codigo_postal');
        $empresa_p->ciudad =$request->get('ciudad');
        $empresa_p->pais = $request->get('pais');
        $empresa_p->datos_factura = $request->get('datos_factura');
        $empresa_p->id_user =Auth::user()->id;
        $empresa_p->status = 1;
        $empresa_p->save();
        if ($empresa_p->save()){

                return redirect('/empresas');


        }else{
            return false;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empresa = DB::table('empresas')
        ->where('empresas.id','=',$id)
        ->first();
        return view('empresas.edit',['empresa'=>$empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa_p = EmpresasModel::where('id',$id)->first();
        $empresa_p->name = $request->get('nombre');
        $empresa_p->email = $request->get('email');
        $empresa_p->contacto = $request->get('contacto');
        $empresa_p->direccion = $request->get('direccion');
        $empresa_p->telefono = $request->get('telefono');
        $empresa_p->direccion =$request->get('direccion');
        $empresa_p->codigo_postal = $request->get('codigo_postal');
        $empresa_p->ciudad =$request->get('ciudad');
        $empresa_p->pais = $request->get('pais');
        $empresa_p->datos_factura = $request->get('datos_factura');
        $empresa_p->id_user =Auth::user()->id;
        $empresa_p->status = 1;
        $empresa_p->update();
        if ($empresa_p->update()){
            return redirect('empresas');
        }else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa_p= EmpresasModel::find($id);
        $empresa_p->status=2;
        $empresa_p->update();
        if( $empresa_p->update()){

        }else{
            return false;
        }

    }

    public function delete_empresa($id)
    {


        $projects = ProjectsModel::where('id_empresa','=',$id)->get();

        foreach($projects as $project){
            //delete results
            $results = ResultsProjectModel::where('id_project','=',$project->id)->get();

            foreach($results as $result){
                $res= ResultsProjectModel::find($result->id);
                $res->delete();
            }

            $solutions = SolutionsProjectModel::where('id_project','=',$project->id)->get();
            foreach($solutions as $solution){
                $sol= SolutionsProjectModel::find($solution->id);
                $sol->delete();
            }

            $proy= ProjectsModel::find($project->id);
            $proy->delete();

            $users = User::where('id_empresa','=',$id)->get();
            foreach($users as $user){
                $proy= User::find($user->id);
                $proy->delete();
            }

        }
        $empresa_p= EmpresasModel::find($id);
        $empresa_p->delete();

        return true;
    }

    public function change_empresa($id)
    {
        $id_admin = Auth::user()->id;
        $user_admin= User::find($id_admin);
        $user_admin->id_empresa=$id;
        $user_admin->update();
        if( $user_admin->update()){
            return $id;
        }else{
            return false;
        }
    }

    public function name_empresa($id){
        $empresa_name= EmpresasModel::find($id);

        return $empresa_name->name;
    }

    public function paises_empresa($id,$pais){
        $pais_empresa = DB::table('paises_empresas')
        ->where('id_empresa','=',$id)
        ->where('pais','=',$pais)
        ->first();

        return $pais_empresa;
    }

    public function change_pais($id_empresa,$pais)
    {
       $check_empresa_pais = DB::table('paises_empresas')
       ->where('id_empresa','=',$id_empresa)
       ->where('pais','=',$pais)
       ->first();

       if($check_empresa_pais == null){

            $new_pais= new PaisesEmpresasModel;
            $new_pais->pais = $pais;
            $new_pais->id_empresa = $id_empresa;
            $new_pais->save();

        }else if($check_empresa_pais != null){
            $del_pais= PaisesEmpresasModel::find($check_empresa_pais->id);
            $del_pais->delete();
        }


    }

    public function getPaises(Request $request)
    {
        $submit = DB::table('paises_empresas')
        ->join('pais','pais.pais','=','paises_empresas.pais')
        ->where('id_empresa','=',Auth::user()->id_empresa)
        ->select('pais.*')
        ->orderBy('pais.pais', 'asc')
        ->get();

        return $submit;
    }
}
