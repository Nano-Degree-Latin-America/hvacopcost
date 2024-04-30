<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserPaisModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $date_now = date('y-m-d');
        $date_future = strtotime('+30 day', strtotime($date_now));
        $date_future = date('y-m-d', $date_future);

        $user=new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->id_empresa=9;
        $user->password=Hash::make($data['password']);
        $user->tipo_user=3;
        $user->fecha_inicio=$date_now;
        $user->fecha_termino=$date_future;
        $user->status=1;
        $user->save();

        $id_pais = DB::table('pais')
        ->where('pais.pais','=',$data['pais'])
        ->first()->idPais;

        UserPaisModel::create([
            'id_user' => $user->id,
            'pais' => $id_pais,
        ]);

        return  $user;
    }

    public function empresas()
    {
        $empresas  = DB::table('empresas')
        ->where('empresas.status','=',1)
        ->get();

        return $empresas;
    }
}
