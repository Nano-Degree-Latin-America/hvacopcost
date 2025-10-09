<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use DB;
use Form;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /*  $this->middleware('auth'); */
       $this->middleware(['auth']);
    }




    public function index(Request $request, $id){
        $users = DB::table('users')
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('users.index', ['users' => $users]);
    }

    public function users(Request $request){
        $today = date('Y-m-d');

        $users = DB::table('users')
        ->join('empresas','empresas.id','=','users.id_empresa')
        ->select('users.*','empresas.name as name_empresa')
        ->orderBy('created_at','desc')
        ->get();

        $empresas = DB::table('empresas')
        ->get();

        return view('users.index', ['users' => $users,'empresas'=>$empresas,'today'=>$today]);
    }

    public function create(Request $request){
        $empresas = DB::table('empresas')
        ->get();

        return view('users.create',['empresas'=>$empresas]);
    }

    public function users_store(Request $request){



        $user=new User;
        $user->name=$request->get('nombre');
        $user->email=$request->get('email');
        $user->id_empresa=$request->get('empresa');
        $user->password=Hash::make($request->get('password'));
        $user->tipo_user=$request->get('type_user');
        $user->fecha_inicio=$request->get('fecha_inicio');
        $user->fecha_termino=$request->get('fecha_termino');
        $user->status=1;
        $user->save();

        return redirect()->action(
            'UserController@users'
        );
    }

    public function reg_ister(Request $request){


        $user=new User;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->tipo_user=3;
        $user->status=1;
        $user->save();
       if( $user->save()){
        $usuario  = $request->get('email');
        $usuario2 =  DB::select('SELECT * FROM users WHERE email = ? ', [$usuario]);
        if (count($usuario2)>0) {

                    Session::put('id',         $usuario2[0]->id);
                    session()->put('email',      $usuario2[0]->email);
                    session()->put('tipo_user',    $usuario2[0]->tipo_user);
                    session()->save();

                    return redirect('/home');
                }

       }
      /*   return Redirect::to('/home'); */
    }



    public function edit(Request $request,$id){

        $user_edit = DB::table('users')
        ->where('users.id','=',$id)
        ->first();
        $empresas = DB::table('empresas')
        ->get();
        return view('users.edit',['user_edit' => $user_edit,'empresas'=>$empresas]);
    }

    public function update(Request $request,$id){

        $user_update= User::find($id);
        $user_update->name=$request->get('nombre');
        $user_update->email=$request->get('email');
        $user_update->id_empresa=$request->get('empresa');
        if ($request->get('email') === "daniel24992@gmail.com") {
            # code...
        }else{

            if($request->get('password') !== '' && $request->get('password') !== null){
                dd($request->get('password'));
                $user_update->password=Hash::make($request->get('password'));
            }else{
                $user_update->password=$user_update->password;
            }
        }

        $user_update->tipo_user=$request->get('type_user');
        $user_update->fecha_inicio=$request->get('fecha_inicio');
        $user_update->fecha_termino=$request->get('fecha_termino');
        $user_update->status=1;
        $user_update->update();

        if($user_update->update()){
            return redirect()->action(
                'UserController@users'
            );
        }
    }

    public function delete(Request $request,$id){

        $user_update= User::find($id);
        $user_update->status=2;
        $user_update->update();
        /* if($user_update->update()){
            return Redirect::to('/users_admin_hvaccopcostla');
        } */
    }

    public function eliminar_usr(Request $request,$id){

        $user_update= User::find($id);
        $user_update->delete();
        /* if($user_update->update()){
            return Redirect::to('/users_admin_hvaccopcostla');
        } */
    }

    public function lo_gin(Request $request)
    {
        // echo password_hash("Admin@21", PASSWORD_DEFAULT);
        $usuario    = $request->input('username');
        /* $usuario2 =  DB::select('SELECT * FROM users WHERE email = ? ', [$usuario]); */
        $usuario2 =  DB::table('users')->where('email','=',$usuario)->where('status','=',1)->first();
        if ($usuario2 !== null) {
                $pass = password_verify($request->input('password'), $usuario2->password);
                if($pass && $usuario2->tipo_user === 5){
                    Session::put('id',         $usuario2->id);
                    session()->put('email',      $usuario2->email);
                    session()->put('tipo_user',    $usuario2->tipo_user);
                    session()->save();
                    return redirect('/users_admin_hvaccopcostla');
                }elseif($pass && $usuario2->tipo_user !== 5){
                   // if (Session::get('idUsuario'))
                   if($usuario2->tipo_user === 3){
                    $today = date('Y-m-d H:i:s');
                    $fecha_user = date($usuario2->created_at);
                    $d1 = DateTime::createFromFormat('Y-m-d H:i:s',  $today);
                    $d2 = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_user);
                    $horas_dif = $d1->diff($d2);

                    if( intval($horas_dif->format('%d')) >= 1){
                        return view('login');
                    }

                   }

                     Session::put('id',         $usuario2->id);
                    session()->put('nombre',      $usuario2->email);
                    session()->put('tipo_user',    $usuario2->tipo_user);
                    session()->save();
                    $this->middleware('guest')->except('logout');
                    return redirect('/home');
                }else{
                    return view('login');
                }
        }else{
            return view('login');
        }
        // password_hash($request->input('password'), PASSWORD_DEFAULT);

    }

    public function check_usr($email){
        $usuario2 =  DB::table('users')->where('email','=',$email)->where('status','=',1)->first();
        if($usuario2->tipo_user === 3){
            $today = date('Y-m-d H:i:s');
            $fecha_user = date($usuario2->created_at);
            $d1 = DateTime::createFromFormat('Y-m-d H:i:s',  $today);
            $d2 = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_user);
            $horas_dif = $d1->diff($d2);

            if( intval($horas_dif->format('%d')) >= 1){
                return 1;
            }

           }else{
            return false;
           }
    }

    public function lo_gout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    public function getLogo(){
        // $submit = DB::table('usuario')
        // ->where('idUsuario', session('idUsuario'))
        // ->get();
        $submit = array(
            "logo" => "Logotipo-HVACOPCOST_blanco.png"
        );
        return response()->json("Logotipo-HVACOPCOST_blanco.png");
    }
    public function actualizarLogo(Request $request){
        date_default_timezone_set("America/Mexico_City");
        if ($request->hasFile('file') && session('idUsuario') == '1'){
            $file           = $request->file("file");
            $extension = $file->getClientOriginalExtension();
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = session('nombre').date("YmdHis").".".$extension;
            $file->move(public_path("assets/images/logos/"),$nombrearchivo);
            $submit = DB::table('usuario')
              ->where('idUsuario', session('idUsuario'))
              ->update(['logo' => $nombrearchivo]);

        }else {
            return redirect()->route('settings');
        }

        return redirect()->route('index');
    }

    public function valida_email(Request $request)
    {

            if ($request->ajax()) {
                $email = $request->get('email');
                $user = DB::table('users')->where('email', '=', $email)->select('users.email')->first();
                return response()->json(['user' => $user]);
            }

    }



}
