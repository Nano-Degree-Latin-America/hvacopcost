<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProjectsModel;
use App\CoordinacionProjectModel;
use App\EquipoCoordinacionModel;
use App\ModelosEmpresaModel;
use App\MarcasEmpresaModel;
use Illuminate\Support\Facades\DB;
use App\CoordinacionMantenimientoModel;
use Illuminate\Support\Facades\Auth;

class CoordinacionService
{

    public function CreateProjectCoordinacion(Request $request): ProjectsModel {

            $new_project = new ProjectsModel;
            $new_project->type_p=4;
            $new_project->id_cat_edifico=$request->values[1];
            $new_project->status=1;
            $new_project->id_empresa=Auth::user()->id_empresa;
            $new_project->id_user=Auth::user()->id;
            $new_project->save();

        if($new_project->save()){

            $coordinacion = $this->SaveProjectCoordinacion($request,$new_project->id);

            return $new_project;
        }
    }

    public function SaveProjectCoordinacion(Request $request,$id_project){
         $new_project_coordinacion = new CoordinacionProjectModel;
         $new_project_coordinacion->id_project = $id_project;
         $new_project_coordinacion->cliente_prospecto = $request->values[0];
         $new_project_coordinacion->ocupacion_semanal = $request->values[2];
         $new_project_coordinacion->tiempo_ingreso = $request->values[3];
         $new_project_coordinacion->tiempo_egreso = $request->values[4];
         $new_project_coordinacion->nombre_propiedad = $request->values[5];
         $new_project_coordinacion->yrs_edificio = $request->values[6];
         $new_project_coordinacion->medio_ambiente = $request->values[7];
         $new_project_coordinacion_aux = explode('kms',$request->values[8]);
         $new_project_coordinacion->distancia_sitio=$new_project_coordinacion_aux[0];
         $new_project_coordinacion->velocidad=$request->values[9];
         $new_project_coordinacion->valor_contrato= $this->precio_to_integer($request->values[10]);
         $new_project_coordinacion_aux_porcent = explode('%',$request->values[11]);
         $new_project_coordinacion->escalacion=$new_project_coordinacion_aux_porcent[0];
         $new_project_coordinacion->personal=$request->values[12];
         $new_project_coordinacion->save();
         if($new_project_coordinacion->save()){
            return $new_project_coordinacion;
         }
    }

    public function CreateEquipoCoordinacion($id_project){
       $project_info = CoordinacionProjectModel::where('id_project','=',$id_project)->first();
       $ocupacion_semanal = $project_info->ocupacion_semanal;

       $new_equipo_coordinacion = new EquipoCoordinacionModel;
       $new_equipo_coordinacion->id_project = $id_project;
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

    public function UpdateEquipoCoordinacion($id,$value,$campo){
        $update_equipo_coordinacion = EquipoCoordinacionModel::find($id);
        switch ($campo) {
            case 'id_sistema':
                $update_equipo_coordinacion->id_sistema = $value;
            break;

            case 'unidad':
                $update_equipo_coordinacion->unidad = $value;
            break;

            case 'id_marca':
                $update_equipo_coordinacion->id_marca = $value;
                $marca = MarcasEmpresaModel::where('id','=',$update_equipo_coordinacion->id_marca)->first();
                if($marca->marca === 'Genérico'){
                     $modelo = ModelosEmpresaModel::where('id_marca','=',$marca->id)->first();
                     $update_equipo_coordinacion->id_modelo = $modelo->id;
                }

            break;

            case 'id_modelo':
                $update_equipo_coordinacion->id_modelo = $value;
            break;

            case 'capacidad':
                $update_equipo_coordinacion->capacidad = $value;
            break;

            case 'cantidad':
                $update_equipo_coordinacion->cantidad = $value;
            break;

            case 'acceso_equipo':
                $update_equipo_coordinacion->acceso_equipo = $value;
            break;

            case 'estado':
                $update_equipo_coordinacion->estado = $value;
            break;

            case 'mantenimiento':
                $update_equipo_coordinacion->mantenimiento = $value;
            break;

            default:
                # code...
                break;
        }
        $update_equipo_coordinacion->update();
        $this->calcularCantidadTotal($id);

    }

    public function calcularCantidadTotal($id){
        $coordinacionEquipos_aux = EquipoCoordinacionModel::where('id','=',$id)->first();
        $capacidad = $coordinacionEquipos_aux->capacidad;
        $cantidad = $coordinacionEquipos_aux->cantidad;
        $total =  intval($capacidad)*intval($cantidad);
        $coordinacionEquipos = EquipoCoordinacionModel::find($id);
        $coordinacionEquipos->cantidad_total = $total;
        $coordinacionEquipos->update();
    }

    public function ManageEquipoCoordinacionCalculo($id, $value, $periodo, $sistema, $id_project)
    {

        $value = max(0, (int) $value);

        DB::transaction(function () use ($id, $value, $periodo, $sistema) {
            // Obtener todos los registros actuales ordenados por id asc (estables para decidir borrado)
            $actuales = CoordinacionMantenimientoModel::where('id_coordinacion', $id)
                ->orderBy('id', 'asc')
                ->get();

            $count = $actuales->count();

            if ($count < $value) {
                // Crear los faltantes en bloque
                $faltantes = $value - $count;
                $rows = [];
                $now = now();

                for ($i = 0; $i < $faltantes; $i++) {
                    $rows[] = [
                        'id_coordinacion' => $id,
                        'sistema'         => $sistema,
                        'cantidad'        => 1,
                        'periodo'         => $periodo,
                        'visita_1'        => 0,
                        'visita_2'        => 0,
                        'visita_3'        => 0,
                        'visita_4'        => 0,
                        'visita_5'        => 0,
                        'visita_6'        => 0,
                        'visita_7'        => 0,
                        'visita_8'        => 0,
                        'visita_9'        => 0,
                        'visita_10'       => 0,
                        'visita_11'       => 0,
                        'visita_12'       => 0,
                        'total_horas'     => 0,
                        'id_empresa'      => Auth::user()->id_empresa,
                        'created_at'      => $now,
                        'updated_at'      => $now,
                    ];
                }

                if (!empty($rows)) {
                    CoordinacionMantenimientoModel::insert($rows);
                }
            } elseif ($count > $value) {
                // Eliminar los más recientes para quedar en $value
                $aEliminar = $count - $value;

                // Tomar los últimos por id (más recientes) y eliminarlos
                $ids = $actuales->sortByDesc('id')
                    ->take($aEliminar)
                    ->pluck('id')
                    ->all();

                if (!empty($ids)) {
                    CoordinacionMantenimientoModel::whereIn('id', $ids)->delete();
                }
            }

            // Mantener el periodo consistente para todos los registros del grupo
            CoordinacionMantenimientoModel::where('id_coordinacion', $id)
                ->update(['periodo' => $periodo]);
        });

        $units = EquipoCoordinacionModel::where('id_project', $id_project)
                ->join('coordinacion_mantenimiento','id_coordinacion','=','coordinacion_equipos.id')
                ->select('coordinacion_mantenimiento.*')
                ->orderBy('id_coordinacion', 'asc')
                ->get();

        return $units;
    }

    public function get_ids_values($id_project){
       $units = EquipoCoordinacionModel::where('id_project','=',$id_project)
       ->select('id','cantidad')
       ->get();
       return $units;
    }

    public function precio_to_integer($precio){
                    $aux = explode("$",   $precio);

                    if(count($aux) == 2){
                        $precio = $aux[1];


                        $aux_comillas= explode(",", $precio);

                        if(count($aux_comillas) == 1){
                            $precio_entero = $precio;
                        }else if(count($aux_comillas)==2){
                            $precio_entero = $aux_comillas[0].$aux_comillas[1];
                        }else if(count($aux_comillas)==3){
                            $precio_entero = $aux_comillas[0].$aux_comillas[1].$aux_comillas[2];
                        }else if(count($aux_comillas)==4){
                            $precio_entero = $aux_comillas[0].$aux_comillas[1].$aux_comillas[2].$aux_comillas[3];
                        }

                    }else if(count($aux)==1){
                        $precio_entero =  $precio;
                    }
                    return $precio_entero;
                }

}
