<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use App\ManoObraHorasModel;
use App\MantenimientoProjectsModel;

use Illuminate\Support\Facades\Redirect;


use funciones\funciones;

class CalculoMantenimientoService
{
    public function new_calculo_mantenimiento_save(Request $request,$id_project)
    {

                $new_mantenimiento_project = new MantenimientoProjectsModel;
                $new_mantenimiento_project->id_project=$id_project;
                $new_mantenimiento_project->cliente_prospecto=$request->get('cliente_pro_mantenimiento');
                $new_mantenimiento_project->nombre_propiedad=$request->get('name_sitio_mantenimiento');
                $new_mantenimiento_project_aux = explode('kms',$request->get('distancia_sitio_mantenimiento'));
                $new_mantenimiento_project->distancia_sitio=$new_mantenimiento_project_aux[0];
                $new_mantenimiento_project->velocidad=$request->get('velocidad_promedio_mantenimiento');
                $new_mantenimiento_project->yrs_edificio=$request->get('yrs_vida_mantenimiento');
                $new_mantenimiento_project->ocupacion_semanal=$request->get('ocupacion_semanal_mantenimiento');
                $new_mantenimiento_project->medio_ambiente=$request->get('tipo_ambiente_mantenimiento');
                $new_mantenimiento_project->personal_enviado=$request->get('personal_enviado');
                $new_mantenimiento_project->cant_hrs_eme=$request->get('cant_hrs_eme_mantenimiento');
                $new_mantenimiento_project->type_mant=1;
                $new_mantenimiento_project->save();


                    // si se guardda el proyecto de mantenimiento se guarda la mano de obra
                    if($new_mantenimiento_project->save()){

                        $new_mano_obra_hora = new ManoObraHorasModel;
                        $new_mano_obra_hora->id_project=$id_project;
                        $new_mano_obra_hora->servicios_emergencias=$request->get('servicio_emergencias_adicionales');
                        $new_mano_obra_hora->tipo_adicional_accesos=$request->get('tiempo_adicional_accesos_adicionales');
                        $new_mano_obra_hora->curso_seguridad_otros=$request->get('curso_seguridad_otros_adicionales');
                        $new_mano_obra_hora->lavado_filtros_aire=$request->get('lavado_filtros_aire_adicionales');
                        $new_mano_obra_hora->lavado_evaporadores=$request->get('lavado_evaporadores_adicionales');
                        $new_mano_obra_hora->lavado_extra_condensadores=$request->get('lavado_extra_condensadores_adicionales');
                        $new_mano_obra_hora->lavado_ventiladores=$request->get('lavado_ventiladores_adicionales');
                        $new_mano_obra_hora->limpieza_grasa=$request->get('limpieza_grasa_adicionales');
                        $new_mano_obra_hora->seguristas_supervicion=$request->get('seguristas_supervicion_adicionales');

                        $costos_filtros_aire_aux = explode('$',$request->get('costos_filtro_aire_adicionales'));
                        $new_mano_obra_hora->costos_filtros_aire= $costos_filtros_aire_aux[1];

                        $paquete_refacciones_aux = explode('$',$request->get('paquete_refacciones_adicionales'));
                        $new_mano_obra_hora->paquete_refacciones=$paquete_refacciones_aux[1];

                        $andamos_gruas_etc_aux = explode('$',$request->get('andamios_gruas_adicionales'));
                        $new_mano_obra_hora->andamos_gruas_etc=$andamos_gruas_etc_aux[1];

                        $pruebas_especiales_aux = explode('$',$request->get('pruebas_especiales_adicionales'));
                        $new_mano_obra_hora->pruebas_especiales=$pruebas_especiales_aux[1];

                        $contratistas_aux = explode('$',$request->get('contratistas_adicionales'));
                        $new_mano_obra_hora->contratistas=$contratistas_aux[1];

                        $viaticos_aux = explode('$',$request->get('viaticos_adicionales'));
                        $new_mano_obra_hora->viaticos=$viaticos_aux[1];

                        $new_mano_obra_hora->save();

                        return true;
                    }

                }

}
