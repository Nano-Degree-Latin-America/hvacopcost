<?php
namespace App\Services;

use App\Contracts\PeriodoCalculatorInterface;
use App\Repositories\EquipoCoordinacionRepository;
use App\Repositories\CoordinacionMantenimientoRepository;
use App\CoordinacionMantenimientoModel;
use App\ProjectsModel;
use App\EquipoCoordinacionModel;
use App\CoordinacionProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoordinacionService
{
    protected $equipos;
    protected $mants;
    protected $periodos;

    public function __construct(
         EquipoCoordinacionRepository $equipos,
         CoordinacionMantenimientoRepository $mants,
         PeriodoCalculatorInterface $periodos
    ) {
        $this->equipos = $equipos;
        $this->mants = $mants;
        $this->periodos = $periodos;
    }

    public function createProjectCoordinacion(Request $request): ProjectsModel
    {
        return DB::transaction(function () use ($request) {
            $p = new ProjectsModel();
            $p->type_p = 4;
            $p->id_cat_edifico = $request->values[1];
            $p->status = 1;
            $p->id_empresa = Auth::user()->id_empresa;
            $p->id_user = Auth::user()->id;
            $p->save();

            $c = new CoordinacionProjectModel();
            $c->id_project = $p->id;
            $c->cliente_prospecto = $request->values[0];
            $c->ocupacion_semanal = $request->values[2];
            $c->tiempo_ingreso = $request->values[3];
            $c->tiempo_egreso = $request->values[4];
            $c->nombre_propiedad = $request->values[5];
            $c->yrs_edificio = $request->values[6];
            $c->medio_ambiente = $request->values[7];
            $c->distancia_sitio = explode('kms', $request->values[8])[0] ?? null;
            $c->velocidad = $request->values[9];
            $c->valor_contrato = $this->precioToInteger($request->values[10]);
            $c->escalacion = explode('%', $request->values[11])[0] ?? null;
            $c->personal = $request->values[12];
            $c->save();

            return $p;
        });
    }

    public function createEquipoCoordinacion(int $idProject)
    {
        $project_info = CoordinacionProjectModel::where('id_project','=',$idProject)->first();
       $ocupacion_semanal = $project_info->ocupacion_semanal;

       $new_equipo_coordinacion = new EquipoCoordinacionModel;
       $new_equipo_coordinacion->id_project = $idProject;
       $new_equipo_coordinacion->id_sistema = null;
       $new_equipo_coordinacion->unidad = null;
       $new_equipo_coordinacion->id_marca = null;
       $new_equipo_coordinacion->id_modelo = null;
       $new_equipo_coordinacion->capacidad = 0;
       $new_equipo_coordinacion->cantidad = 0;
       $new_equipo_coordinacion->acceso_equipo = null;
       $new_equipo_coordinacion->estado = null;
       $new_equipo_coordinacion->yrs_life = $project_info->yrs_edificio;
       $new_equipo_coordinacion->horario = $project_info->ocupacion_semanal;
       $new_equipo_coordinacion->cantidad_total = null;
       $new_equipo_coordinacion->mantenimiento = null;
       $new_equipo_coordinacion->save();
       if($new_equipo_coordinacion->save()){
        return $new_equipo_coordinacion;
       }
    }

    public function updateEquipoCoordinacion(int $id, $value, string $campo): bool
    {
        $ok = $this->equipos->updateField($id, $campo, $value);

        if ($ok && $campo === 'id_marca') {
            $marca = MarcasEmpresaModel::find($value);
            if ($marca->marca === 'Genérico') {
                $modelo = ModelosEmpresaModel::where('id_marca', $marca->id)->first();
                if ($modelo) $this->equipos->updateField($id, 'id_modelo', $modelo->id);
            }
        }

        if ($ok && in_array($campo, ['capacidad', 'cantidad'], true)) {
            $this->equipos->updateCantidadTotal($id);
        }

        return $ok;
    }

    public function manageEquipoCoordinacionCalculo(
        int $equipoId,
        int $value,
        ?string $periodo,
        string $sistema,
        int $projectId
    ) {
        $value = max(0, $value);

        DB::transaction(function () use ($equipoId, $value, $periodo, $sistema) {
            $actuales = $this->mants->getByEquipo($equipoId);
            $count = $actuales->count();
            $data_array = [];
            if ($count < $value) {
                $faltan = $value - $count;
                $rows = [];
                $now = now();
                for ($i = 0; $i < $faltan; $i++) {
                    $rows[] = [
                        'id_coordinacion' => $equipoId,
                        'sistema'         => $sistema,
                        'cantidad'        => 1,
                        'periodo'         => $periodo,
                        'visita_1' => 0, 'visita_2' => 0, 'visita_3' => 0, 'visita_4' => 0,
                        'visita_5' => 0, 'visita_6' => 0, 'visita_7' => 0, 'visita_8' => 0,
                        'visita_9' => 0, 'visita_10' => 0, 'visita_11' => 0, 'visita_12' => 0,
                        'total_horas' => 0,
                        'id_empresa'  => Auth::user()->id_empresa,
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }
                if ($rows) $this->mants->insertBulk($rows);
            } elseif ($count > $value) {
                $sobran = $count - $value;
                $ids = $actuales->sortByDesc('id')->take($sobran)->pluck('id')->all();
                if ($ids) $this->mants->deleteByIds($ids);
            }
        });

        $data = EquipoCoordinacionModel::where('id_project', $projectId)
            ->join('coordinacion_mantenimiento', 'id_coordinacion', '=', 'coordinacion_equipos.id')
            ->select('coordinacion_mantenimiento.*')
            ->orderBy('id_coordinacion', 'asc')
            ->get();

        $data_return = [];
        foreach ($data as $item) {
            $clon = clone $item;
            // Para cada visita_1..visita_12
            for ($i = 1; $i <= 12; $i++) {
                $visita_prop = 'visita_' . $i;
                if (isset($clon->$visita_prop)) {
                    $clon->$visita_prop = $this->mants->noFormulaValue($item->id, $item->$visita_prop);
                }
            }
            // Para total_horas
            if (isset($clon->total_horas)) {
                $clon->total_horas = $this->mants->noFormulaValue($item->id, $item->total_horas);
            }
            $data_return[] = $clon;
        }
        return $data_return;
    }

    public function setValueVisita(int $value, string $visita, int $idCalculo)
    {
        return $this->mants->updateVisitaYTotal($idCalculo, $visita, $value);
    }

    public function inputsCoordinacionToCero($id_calculo,$visita){
        $update_visita = CoordinacionMantenimientoModel::find($id_calculo);
        $update_visita->$visita = intVal(0);
        $update_visita->update();
    }

    public function get_ids_values($id_project){
       $units = EquipoCoordinacionModel::where('id_project','=',$id_project)
       ->select('id','cantidad')
       ->get();
       return $units;
    }

    public function setValuesCoordinacion($value,$aux,$id_calculo){
         $update_visita = CoordinacionProjectModel::find($id_calculo);
         $update_visita->$aux = $value;
         $update_visita->update();
    }

    public function setPeriodoCoordinacion($value,$id_calculo){
        $update_visita = CoordinacionMantenimientoModel::find($id_calculo);
        $update_visita->periodo = $value;
        $update_visita->update();

        return true;

    }

    private function precioToInteger(string $precio): int
    {
        $precio = str_replace(['$', ','], '', $precio);
        return (int)$precio;
    }
}
