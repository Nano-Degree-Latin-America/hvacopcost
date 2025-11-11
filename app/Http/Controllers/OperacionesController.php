<?php
namespace App\Http\Controllers;

use App\Services\CoordinacionService;
use App\Contracts\PeriodoCalculatorInterface;
use App\Repositories\EquipoCoordinacionRepository;
use App\Repositories\SistemasRepository;
use App\Repositories\ConfiguracionesMantenimientoCoordinacionRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\CategoriaEdificioRepository;
use App\Repositories\CoordinacionProjectRepository;
use App\Repositories\FactorAmbienteRepository;
use App\Repositories\CoordinacionMantenimientoRepository;
use App\SistemasModel;
use App\ConfiguracionesMantenimientoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    protected $coord;
    protected $coordMantenimiento;
    protected $equipos;
    protected $configs;
    protected $calcPeriodo;
    protected $sistemas;
    protected $project;
    protected $categoriaEdificio;
    protected $coordinacionProject;
    protected $factorAmbiente;

    public function __construct(
        CoordinacionService $coord,
        EquipoCoordinacionRepository $equipos,
        ConfiguracionesMantenimientoCoordinacionRepository $configs,
        PeriodoCalculatorInterface $calcPeriodo,
        SistemasRepository $sistemas,
        ProjectRepository $project,
        CategoriaEdificioRepository $categoriaEdificio,
        CoordinacionProjectRepository $coordinacionProject,
        FactorAmbienteRepository $factorAmbiente,
        CoordinacionMantenimientoRepository $coordMantenimiento
    ) {
        $this->middleware('auth');
        $this->coord = $coord;
        $this->equipos = $equipos;
        $this->configs = $configs;
        $this->calcPeriodo = $calcPeriodo;
        $this->sistemas = $sistemas;
        $this->project = $project;
        $this->categoriaEdificio = $categoriaEdificio;
        $this->coordinacionProject = $coordinacionProject;
        $this->factorAmbiente = $factorAmbiente;
        $this->coordMantenimiento = $coordMantenimiento;
    }

     // Método que existía antes
    public function project_coordinacion($id_project){
        $project_edit =  $this->project->project_edit($id_project);
        $id_cat_edifico =  $this->project->project_cat_edificio($id_project);
        $cate_edificio =  $this->categoriaEdificio->get_categorias_edificio();
        $project_edit_coordinacion = $this->coordinacionProject->project_edit_coordinacion($id_project);
        $factor_ambiente = $this->factorAmbiente->factor_ambiente();
        return view('operaciones.operaciones_index_edit', compact('id_project', 'cate_edificio', 'id_cat_edifico', 'project_edit', 'project_edit_coordinacion', 'factor_ambiente'));
    }

    public function index(Request $request)
    {
        return view('operaciones.operaciones_index');
    }

    public function save_project_coordinacion(Request $request)
    {
        $p = $this->coord->createProjectCoordinacion($request);
        return $p->id;
    }

    public function save_equipo_coordinacion(int $id_project)
    {
        return $this->coord->createEquipoCoordinacion($id_project);
    }

    public function save_dates_coordinacion_equipos(int $id, $value, string $campo)
    {
        return $this->coord->updateEquipoCoordinacion($id, $value, $campo);
    }

    public function set_value_visita(int $value, string $visita, int $id_calculo)
    {
        return $this->coord->setValueVisita($value, $visita, $id_calculo);
    }

    public function get_ids_units_calculo_coordinacion(int $id_project){
        $ids_values = $this->coord->get_ids_values($id_project);
        return response()->json($ids_values);
    }

    public function inputs_coordinacion_to_cero(int $id_calculo, string $visita){
        $inputs_coordinacion_to_cero = $this->coord->inputsCoordinacionToCero($id_calculo,$visita);
        return $inputs_coordinacion_to_cero;
    }

    public function set_values_coordinacion($value,string $aux,int $id_calculo){
        $set_values_coordinacion = $this->coord->setValuesCoordinacion($value,$aux,$id_calculo);
        return $set_values_coordinacion;
    }

    public function save_periodo_coordinacion($value,$id_calculo){
        $set_periodo_coordinacion = $this->coord->setPeriodoCoordinacion($value,$id_calculo);
        return $set_periodo_coordinacion;
    }

    public function no_formula_value(int $id,float $value){
        $get_no_formula_value = $this->coordMantenimiento->noFormulaValue($id,$value);
        return $get_no_formula_value;
    }

    public function delete_coordinacion_project(int $id){
        $delete_coordinacion_project = $this->coord->deleteCoordinacionProject($id);
        return $delete_coordinacion_project;
    }


    public function manage_units_coordinacion(int $id, int $value)
    {
        $equipo = $this->equipos->find($id);
        if (!$equipo) return response()->json(['error' => 'No existe equipo'], 404);

        $sistema = $equipo->id_sistema ? (SistemasModel::find($equipo->id_sistema)->name ?? '') : '';
        $periodo = $equipo->mantenimiento === 'ashrae'
            ? $this->calcPeriodo->calcular((int)$equipo->id_sistema, $equipo->unidad)
            : null;

        $units = $this->coord->manageEquipoCoordinacionCalculo($id, $value, $periodo, $sistema, (int)$equipo->id_project);
        return response()->json($units);
    }

    public function show_units_to_charge(int $id, int $value)
    {
        $units = $this->coordMantenimiento->showUnitsToCharge($id, $value);
        return response()->json($units);
    }




    public function traer_tecnico_ayudante(string $value){
         $set_valor = $this->configs->find_tecnico_ayudante($value);
        return $set_valor;
     }


    public function traer_sistemas_calculo_coordinacion(int $id){
        $sistema = $this->sistemas->traer_sistemas_calculo_coordinacion($id);
        return $sistema;
    }


    public function traer_kms(){
            $set_valor = $this->configs->traer_kms();
            return $set_valor;
     }

    //
    public function traer_burden(){
            $set_valor = $this->configs->traer_burden();
            return $set_valor;
    }

    public function equipos_coordinacion(int $id_project)
    {
        return response()->json($this->equipos->getByProject($id_project));
    }
}
