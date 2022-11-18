<?php

namespace App\Http\Controllers;
use DateTime;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\EmpresasModel;
use App\SucursalesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;

class SucursalesController extends Controller
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

       /*  $empresas = DB::table('empresas')
        ->join('users','users.id','=','empresas.id_user')
        ->select('empresas.*','users.name as name_user')
        ->get();

        return view('empresas.index',["empresas"=>$empresas]); */
    }

    public function sucursales_empresa($id)
    {

        $sucursales = DB::table('sucursales')
        ->join('users','users.id','=','sucursales.id_user')
        ->where('sucursales.id_empresa','=',$id)
        ->select('sucursales.*','users.name as name_user')
        ->get();

        return view('sucursales.index',["sucursales"=>$sucursales,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('sucursales.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user->name = "user -".$request->get('nombre');
        $user->email = $request->get('email');
        $user->password = Hash::make('12345678');
        $user->tipo_user = 1;
        $user->id_user =Auth::user()->id;
        $user->status = 1;
        $user->save();

        $sucursal = new SucursalesModel;
        $sucursal->name = $request->get('nombre');
        $sucursal->email = $request->get('email');
        $sucursal->numero_fiscal = $request->get('numero_fiscal');
        $sucursal->telefono = $request->get('telefono');
        $sucursal->direccion = $request->get('direccion');
        $sucursal->codigo_postal = $request->get('codigo_postal');
        $sucursal->ciudad = $request->get('ciudad');
        $sucursal->id_empresa = $request->get('id_empresa');
        $sucursal->id_user =Auth::user()->id;
        $sucursal->status = 1;
        $sucursal->save();
        if ($sucursal->save()){
            $user_upate = User::find($user->id);
            $user_upate->id_empresa = $sucursal->id;
            $user_upate->update();

            return redirect()->action(
                'SucursalesController@sucursales_empresa', [$request->get('id_empresa')]
            );
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

        $sucursal = DB::table('sucursales')
        ->where('sucursales.id','=',$id)
        ->first();
        return view('sucursales.edit',['sucursal'=>$sucursal]);
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
        $sucursal = SucursalesModel::where('id',$id)->first();
        $sucursal->name = $request->get('nombre');
        $sucursal->email = $request->get('email');
        $sucursal->numero_fiscal = $request->get('numero_fiscal');
        $sucursal->telefono = $request->get('telefono');
        $sucursal->direccion = $request->get('direccion');
        $sucursal->codigo_postal = $request->get('codigo_postal');
        $sucursal->ciudad = $request->get('ciudad');
        $sucursal->id_user =Auth::user()->id;
        $sucursal->status = 1;
        $sucursal->update();
        if ($sucursal->update()){
            return redirect()->action(
                'SucursalesController@sucursales_empresa', [$sucursal->id_empresa]
            );
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
        $empresa_p= SucursalesModel::find($id);
        $empresa_p->status=2;
        $empresa_p->update();
        if( $empresa_p->update()){

        }else{
            return false;
        }

    }
}
