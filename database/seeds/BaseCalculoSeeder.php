<?php

use Illuminate\Database\Seeder;
use App\BaseCalculoModel;
use App\UnidadesModel;

class BaseCalculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array_equipo = [];
       /*  $array_equipo =  ['basico_1','c/ economizador_1','c/ Heat Recovery_1','Manejadora_2','Fan Coil M/HSP_2','Fan Coil LSP_2','No Ductado_3','Ductado_3','Combinado_3','Horizontal_4','Vertical_4','Torre Cerrada_5','Torre Abierta_5','Pared - Piso - Techo_6','Concealed_6','Casette_6','Confort - Constante_7','Confort - Variable_7','Proceso_7','Confort - Constante_8','Confort - Variable_8','Proceso_8','Confort - Constante_9','Confort - Variable_9','Proceso_9','Confort - Constante_10','Confort - Variable_10','Proceso_10','Axial Directo_11','Axial Polea_11','Centrífugo Polea_11','Campana (Techo)_11','Axial Directo_12','Axial Polea_12','Centrífugo Polea_12']; */

        $unidades_aux = UnidadesModel::get();

        foreach($unidades_aux as $unidad_aux){
            //$parts = explode('_', $array_equipo[$i]);

            $new_equipo = new BaseCalculoModel;
            $new_equipo->sistema = $unidad_aux->equipo;
            $new_equipo->id_unidad = $unidad_aux->id;
            $new_equipo->costo_instalacion = 0;
            $new_equipo->rav = 0;

            if($unidad_aux->identificador== 'basico'){
                $new_equipo->costo_instalacion = 2000;
                $new_equipo->rav = 3.5;
            }

            if($unidad_aux->identificador== 'c_economizador'){
                $new_equipo->costo_instalacion = 2200;
                $new_equipo->rav = 3.5;
            }

            if($unidad_aux->identificador== 'w_heat_rec'){
                $new_equipo->costo_instalacion = 2500;
                $new_equipo->rav = 3.5;
            }

            if($unidad_aux->identificador== 'horz' || $unidad_aux->identificador== 'vert'){
                $new_equipo->costo_instalacion = 1000;
                $new_equipo->rav = 3.5;
            }

            if($unidad_aux->identificador== 'agu_cir_cer'){
                $new_equipo->costo_instalacion = 1950;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'agu_cir_abr'){
                $new_equipo->costo_instalacion = 2100;
                $new_equipo->rav = 4.0;
            }


            if($unidad_aux->identificador== 'confort_constante_8'){
                $new_equipo->costo_instalacion = 2500;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'confort_variable_8'){
                $new_equipo->costo_instalacion = 2800;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'proceso_8'){
                $new_equipo->costo_instalacion = 2000;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'confort_constante_9'){
                $new_equipo->costo_instalacion = 2700;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'confort_variable_9'){
                $new_equipo->costo_instalacion = 3000;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'proceso_9'){
                $new_equipo->costo_instalacion = 2200;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'proceso_10'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'confort_constante_10'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'confort_variable_10'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.5;
            }

            if($unidad_aux->identificador== 'proceso_11'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 5.0;
            }

            if($unidad_aux->identificador== 'confort_constante_11'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 5.0;
            }

            if($unidad_aux->identificador== 'confort_variable_11'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 5.0;
            }


            if($unidad_aux->identificador== 'axial_directo_extractor'){
                $new_equipo->costo_instalacion = 1;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'axial_polea_extractor'){
                $new_equipo->costo_instalacion = 0.8;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'centrifugo_polea_extractor'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'campana_extractor'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'axial_directo_inyector'){
                $new_equipo->costo_instalacion = 0.8;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'axial_polea_inyector'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.0;
            }

            if($unidad_aux->identificador== 'centrifugo_polea_inyector'){
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 4.0;
            }






            if($unidad_aux->equipo == 12 || $unidad_aux->equipo == 13){
                $new_equipo->unidad_costo_instalacion = '$/cfm';
            }else{
                $new_equipo->unidad_costo_instalacion = '$/TR';
            }

            $new_equipo->save();
        }
    }
}
