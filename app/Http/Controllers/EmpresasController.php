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
use App\TypeProjectModel;
use App\ProjectsModel;
use App\SucursalesModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
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
    public function index(Request $request)
    {
        $query=trim($request->GET('searchText'));

        $empresas = DB::table('empresas')
                ->join('users','users.id','=','empresas.id_user')
                ->select('empresas.*','users.name as name_user')
                ->orderBy('created_at','desc')
                ->get();
        $emps = DB::table('empresas')
        ->get();
        $empresa_admin  = DB::table('empresas')
        ->where('empresas.id','=',Auth::user()->id_empresa)
        ->first()->name;

        return view('empresas.index',["emps"=>$emps,"empresas"=>$empresas,"empresa_admin"=>$empresa_admin,"searchText"=>$query]);
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
                $new_permiso = new TypeProjectModel;
                $new_permiso->p_n = 1;
                $new_permiso->p_r = 1;
                $new_permiso->mant = 1;
                $new_permiso->id_empresa = $empresa_p->id;
                $new_permiso->save();
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

    public function change_type_project($id_empresa,$type_p)
    {
       $check_type_pais = DB::table('type_project_empresas')
       ->where('id_empresa','=',$id_empresa)
       ->first();


        if($check_type_pais){
            $update_type= TypeProjectModel::find($check_type_pais->id);
            $type_p_aux_pn = $update_type->p_n;
            $type_p_aux_pr = $update_type->p_r;
            $type_p_aux_mant = $update_type->mant;
            if($type_p == 'p_n'){
                if($type_p_aux_pn == 1){
                    $update_type->p_n = 0;
                }

                if($type_p_aux_pn == 0){
                    $update_type->p_n = 1;
                }
            }

            if($type_p == 'p_r'){
                if($type_p_aux_pr == 1){
                    $update_type->p_r = 0;
                }

                if($type_p_aux_pr == 0){
                    $update_type->p_r = 1;
                }
            }

            if($type_p == 'man'){
                if($type_p_aux_mant == 1){
                    $update_type->mant = 0;
                }

                if($type_p_aux_mant == 0){
                    $update_type->mant = 1;
                }
            }

            $update_type->id_empresa = $id_empresa;
            $update_type->update();
        }else{
            if($type_p == 'p_n'){
                $new_type= new TypeProjectModel;
                $new_type->p_n = 1;
                $new_type->p_r = 0;
                $new_type->mant = 0;
                $new_type->id_empresa = $id_empresa;
                $new_type->save();
                return $new_type;
            }

            if($type_p == 'p_r'){
                $new_type= new TypeProjectModel;
                $new_type->p_n = 0;
                $new_type->p_r = 1;
                $new_type->mant = 0;
                $new_type->id_empresa = $id_empresa;
                $new_type->save();
                return $new_type;
            }

            if($type_p == 'man'){
                $new_type= new TypeProjectModel;
                $new_type->p_n = 0;
                $new_type->p_r = 0;
                $new_type->mant = 1;
                $new_type->id_empresa = $id_empresa;
                $new_type->save();
                return $new_type;
            }


        }



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

    public function add_marcas_empresas(){

        $array_paquetes = ['1','2','5','6','7'];
        //$marcas_paquetes = ['Carrier','Trane','JCI','Lennox','Rheem','Aoon'];
        $marcas_paquetes = ['Genérico'];
        $empresas = DB::table('empresas')
        ->get();


        for ($a=0; $a < count($empresas) ; $a++) {

            for ($z=0; $z < count($array_paquetes) ; $z++) {

                for ($i=0; $i < count($marcas_paquetes) ; $i++) {
                    $new_marca= new MarcasEmpresaModel;
                    $new_marca->marca = $marcas_paquetes[$i];
                    $new_marca->equipo = $array_paquetes[$z];
                    $new_marca->id_empresa = $empresas[$a]->id;
                    $new_marca->id_user = Auth::user()->id;
                    $new_marca->save();

                }
            }
        }

        dd('paquetes');

    }

    public function add_marcas_empresasvrf(){

        $array_paquetes = ['3','4'];
       /*  $marcas_paquetes = ['Daikin','Hitachi','Samsung','Midea','Toshiba','Mitsubishi','LG']; */
       $marcas_paquetes = ['Genérico'];
        $empresas = DB::table('empresas')
        ->get();


        for ($a=0; $a < count($empresas) ; $a++) {

            for ($z=0; $z < count($array_paquetes) ; $z++) {

                for ($i=0; $i < count($marcas_paquetes) ; $i++) {
                    $new_marca= new MarcasEmpresaModel;
                    $new_marca->marca = $marcas_paquetes[$i];
                    $new_marca->equipo = $array_paquetes[$z];
                    $new_marca->id_empresa = $empresas[$a]->id;
                    $new_marca->id_user = Auth::user()->id;
                    $new_marca->save();

                }
            }
        }

        $marcas_generico = DB::table('marcas_empresa')->get();

        foreach($marcas_generico as $marcas){
           if($marcas->marca == 'Generico'){
            $new_marca=  MarcasEmpresaModel::find($marcas->id);
            $new_marca->marca = 'Génerico';
            $new_marca->update();
           }
        }
        dd('vrfs');

    }

    public function add_marcas_empresaschillers(){

        $array_paquetes = ['8','9','10'];
        $marcas_paquetes = ['Carrier','Trane','York','Daikin','McQuay','Mitsubishi','Génerico'];
        $empresas = DB::table('empresas')
        ->get();


        for ($a=0; $a < count($empresas) ; $a++) {

            for ($z=0; $z < count($array_paquetes) ; $z++) {

                for ($i=0; $i < count($marcas_paquetes) ; $i++) {
                    $new_marca= new MarcasEmpresaModel;
                    $new_marca->marca = $marcas_paquetes[$i];
                    $new_marca->equipo = $array_paquetes[$z];
                    $new_marca->id_empresa = $empresas[$a]->id;
                    $new_marca->id_user = Auth::user()->id;
                    $new_marca->save();

                }
            }
        }

        dd('chillers');

    }

    public function add_genericos(){

        $array_paquetes = ['8','9','10'];
        $marcas_paquetes = ['Carrier','Trane','York','Daikin','McQuay','Mitsubishi','Génerico'];
        $empresas = DB::table('empresas')
        ->get();


for ($a=0; $a < count($empresas) ; $a++) {


    $marcas = DB::table('marcas_empresa')
    ->where('marcas_empresa.marca','=','Génerico')
    ->where('marcas_empresa.id_empresa','=',$empresas[$a]->id)
    ->get();

        for ($i=0; $i < count($marcas) ; $i++) {
            $new_modelo= new ModelosEmpresaModel;
            $new_modelo->modelo = 'Génerico';
            $new_modelo->eficiencia = 'SEER';
            $new_modelo->id_marca = $marcas[$i]->id;
            $new_modelo->id_empresa =  $empresas[$a]->id;
            $new_modelo->save();

        }
}
      /*   foreach ($genericos as $key => $value) {
            # code...
        } */

        /* for ($a=0; $a < count($empresas) ; $a++) {

            for ($z=0; $z < count($array_paquetes) ; $z++) {

                for ($i=0; $i < count($marcas_paquetes) ; $i++) {
                    $new_marca= new MarcasEmpresaModel;
                    $new_marca->marca = $marcas_paquetes[$i];
                    $new_marca->equipo = $array_paquetes[$z];
                    $new_marca->id_empresa = $empresas[$a]->id;
                    $new_marca->id_user = Auth::user()->id;
                    $new_marca->save();

                }
            }
        } */

        dd('genericos modelos');

    }
}
