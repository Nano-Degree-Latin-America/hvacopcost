<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PropiedadesService;
use App\Repositories\PropiedadesRepository;
use Illuminate\Support\Facades\Auth;

class PropiedadesController extends Controller
{
    protected $propiedadesService;
    protected $propiedadesRepository;

    public function __construct(
        PropiedadesService $propiedadesService,
        PropiedadesRepository $propiedadesRepository
    ) {
        $this->middleware('auth');
        $this->propiedadesService = $propiedadesService;
        $this->propiedadesRepository = $propiedadesRepository;
    }

    public function index($id_cliente)
    {
       $propiedades = $this->propiedadesRepository->getPropiedades($id_cliente);
        return view('propiedades.index',compact('propiedades','id_cliente'));
    }
    public function list(){
        $id_empresa = Auth::user()->id_empresa;
        $propiedades = $this->propiedadesRepository->getPropiedadesGeneral($id_empresa);
        return view('propiedades.index',compact('propiedades','id_empresa'));
    }
    public function listgral(){
        $id_empresa = Auth::user()->id_empresa;
        $propiedades = $this->propiedadesRepository->getPropiedadesGeneral($id_empresa);
        return $propiedades;
    }
    public function store(Request $request,int $id_empresa)
    {
       $this->propiedadesService->store($request,$id_empresa);
    }
    public function edit(int $id)
    {
       return $this->propiedadesRepository->getPropiedad($id);
    }
    public function edit_save(Request $request, int $id)
    {
       return $this->propiedadesService->edit($request,$id);
    }
    public function delete($id){
        $this->propiedadesService->delete($id);
        return true;
    }
    public function get_propiedades_cliente(int $id_cliente)
    {
        return $this->propiedadesRepository->getPropiedades($id_cliente);
    }
    public function generar_propiedades()
    {
        $this->propiedadesService->generar_propiedades();
        return response()->json(['message' => 'Propiedades generadas correctamente']);
    }
}
