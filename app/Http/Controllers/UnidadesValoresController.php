<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\UnidadesModel;
use App\DisenoModel;
use App\ControlesModel;
use App\DrModel;
use App\FiltracionModel;
use App\VentilacionModel;
use funciones\funciones;
use Illuminate\Http\Request;

class UnidadesValoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $unidades = UnidadesModel::get();
        $disenos = DisenoModel::get();
        $drs = DrModel::get();
        $ventilaciones = VentilacionModel::get();
        $filtraciones = FiltracionModel::get();
        $controles = ControlesModel::get();
        return view('unidades_valores.index',['unidades'=>$unidades,'disenos'=>$disenos,'drs'=>$drs,'ventilaciones'=>$ventilaciones,'filtraciones'=>$filtraciones,'controles'=>$controles]);
    }
}
