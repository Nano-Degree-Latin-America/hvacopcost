<?php
namespace App\Repositories;

use App\CoordinacionMantenimientoModel;
use App\Repositories\CoordinacionProjectRepository;
use App\Repositories\ConfiguracionesMantenimientoCoordinacionRepository;
use App\Repositories\FactorAmbienteRepository;
use App\Repositories\FactorEstadoUnidadRepository;
use App\Repositories\FactorHorasDiariasRepository;
use App\Repositories\FactorTipoAccesoRepository;
use App\Repositories\FactorYrsLifeRepository;

use Illuminate\Support\Collection;

class CoordinacionMantenimientoRepository
{

    protected $coordProject;
    protected $configs;
    protected $estadoUnidad;
    protected $factorAmbiente;
    protected $horasDiarias;
    protected $tipo_acceso;
    protected $yrs_life;



    public function __construct(
          CoordinacionProjectRepository $coordProject,
          ConfiguracionesMantenimientoCoordinacionRepository $configs,
          FactorAmbienteRepository $factorAmbiente,
          FactorEstadoUnidadRepository $estadoUnidad,
          FactorHorasDiariasRepository $horasDiarias,
          FactorTipoAccesoRepository $tipo_acceso,
          FactorYrsLifeRepository $yrs_life
    ) {
        $this->coordProject = $coordProject;
        $this->configs = $configs;
        $this->factorAmbiente = $factorAmbiente;
        $this->estadoUnidad = $estadoUnidad;
        $this->horasDiarias = $horasDiarias;
        $this->tipo_acceso = $tipo_acceso;
        $this->yrs_life = $yrs_life;
    }

    public function getByEquipo(int $idCoordinacion): Collection
    {
        return CoordinacionMantenimientoModel::where('id_coordinacion', $idCoordinacion)
            ->orderBy('id', 'asc')->get();
    }

    public function insertBulk(array $rows): bool
    {
        return CoordinacionMantenimientoModel::insert($rows);
    }

    public function deleteByIds(array $ids): int
    {
        return CoordinacionMantenimientoModel::whereIn('id', $ids)->delete();
    }

    public function updateVisitaYTotal(int $id, string $visita, int $value): ?CoordinacionMantenimientoModel
    {
        $val = $this->calculateValueCoordinacion($id,$value);
        $m = CoordinacionMantenimientoModel::find($id);
        if (!$m) return null;

        $m->$visita = $val;
        $total = 0;
        for ($i = 1; $i <= 12; $i++) {
            $prop = 'visita_' . $i;
            $total += ($m->$prop);
        }
        $m->total_horas = $total;
        $m->save();
        return $m;
    }

    public function calculateValueCoordinacion($id,$value){
        //((value)+(value*ambiente)+(value*estado_unidad)+(value*horas_diarias))*f_tipo_acceso*años_vida_fav

        $coordinacion_equipos = CoordinacionMantenimientoModel::where('coordinacion_mantenimiento.id', $id)
        ->join('coordinacion_equipos', 'coordinacion_equipos.id', '=', 'coordinacion_mantenimiento.id_coordinacion')
        ->select('coordinacion_equipos.*')
        ->first();

        $coordinacion_project = CoordinacionMantenimientoModel::where('coordinacion_mantenimiento.id', $id)
        ->join('coordinacion_equipos', 'coordinacion_equipos.id', '=', 'coordinacion_mantenimiento.id_coordinacion')
        ->join('coordinacion_projects', 'coordinacion_projects.id_project', '=', 'coordinacion_equipos.id_project')
        ->select('coordinacion_projects.*')
        ->first();

        $medio_ambiente_value = $this->factorAmbiente->getFactorAmbiente($coordinacion_project->medio_ambiente);
        $estado_unidad_value = $this->estadoUnidad->factorEstadoUnidad($coordinacion_equipos->estado);
        $horas_diarias_value = $this->horasDiarias->getFactorHorasDiariasCoordinacion($coordinacion_equipos->horario);
        $tipo_acceso_value = $this->tipo_acceso->getFactorTipoAcceso($coordinacion_equipos->acceso_equipo);
        $yrs_life_value = $this->yrs_life->getFactorYrsLifeCoordinacion($coordinacion_equipos->yrs_life);
        $val = (($value)+($value*$medio_ambiente_value)+($value*$estado_unidad_value)+($value*$horas_diarias_value))*$tipo_acceso_value*$yrs_life_value;
        return number_format($val, 2);
    }
}
