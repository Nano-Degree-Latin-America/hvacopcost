<?php

use Illuminate\Database\Seeder;
use App\UnidadesModel;
class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Básico';
        $new_equipo->identificador = 'basico';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 1;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'c/ Economizador';
        $new_equipo->identificador = 'c_economizador';
        $new_equipo->valor = 0.94;
        $new_equipo->equipo = 1;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'c/ Heat Recovery';
        $new_equipo->identificador = 'w_heat_rec';
        $new_equipo->valor = 0.9;
        $new_equipo->equipo = 1;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Mochila (Pared)';
        $new_equipo->identificador = 'mochila_pared';
        $new_equipo->valor = 0.9;
        $new_equipo->equipo = 1;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadora (Hasta 7.5 m)';
        $new_equipo->identificador = 'manejadora';
        $new_equipo->valor = 1.04;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadora (Hasta 30 m)';
        $new_equipo->identificador = 'manejadora2';
        $new_equipo->valor = 1.06;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoil M/HSP (Hasta 7.5 m)';
        $new_equipo->identificador = 'fancoil';
        $new_equipo->valor = 1.045;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoil M/HSP (Hasta 15 m)';
        $new_equipo->identificador = 'fancoil2';
        $new_equipo->valor = 1.065;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoil LSP (Hasta 7.5 m)';
        $new_equipo->identificador = 'fancoil_lsp_spt';
        $new_equipo->valor = 1.055;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoil LSP (Hasta 15 m)';
        $new_equipo->identificador = 'fancoil_lsp_spt2';
        $new_equipo->valor = 1.075;
        $new_equipo->equipo = 2;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Pared/Piso/Techo';
        $new_equipo->identificador = 'ca_pi_te';
        $new_equipo->valor = 0.98;
        $new_equipo->equipo = 3;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoil (LSP)';
        $new_equipo->identificador = 'fancoil_lsp';
        $new_equipo->valor = 1.01;
        $new_equipo->equipo = 3;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Cassette';
        $new_equipo->identificador = 'ca';
        $new_equipo->valor = 0.96;
        $new_equipo->equipo = 3;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadoras';
        $new_equipo->identificador = 'man';
        $new_equipo->valor = 1.06;
        $new_equipo->equipo = 4;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fancoils (M/HSP)';
        $new_equipo->identificador = 'fancoil_hsp';
        $new_equipo->valor = 1.08;
        $new_equipo->equipo = 4;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadoras DOA + HR';
        $new_equipo->identificador = 'man_doa_hr';
        $new_equipo->valor = 0.84;
        $new_equipo->equipo = 4;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Horiozontal';
        $new_equipo->identificador = 'horz';
        $new_equipo->valor = 1.05;
        $new_equipo->equipo = 5;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Vertical';
        $new_equipo->identificador = 'vert';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 5;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Torre Circuito Cerrado';
        $new_equipo->identificador = 'agu_cir_cer';
        $new_equipo->valor = 0.86;
        $new_equipo->equipo = 6;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Torre Circuito Abierto';
        $new_equipo->identificador = 'agu_cir_abr';
        $new_equipo->valor = 0.96;
        $new_equipo->equipo = 6;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Pared/Piso/Techo (Hasta 7.5 m)';
        $new_equipo->identificador = 'pa_pi_te';
        $new_equipo->valor = 0.94;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Pared/Piso/Techo (Hasta 15 m)';
        $new_equipo->identificador = 'pa_pi_te2';
        $new_equipo->valor = 0.95;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Concealed (Hasta 7.5 m)';
        $new_equipo->identificador = 'duc_con';
        $new_equipo->valor = 0.91;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Concealed (Hasta 15 m)';
        $new_equipo->identificador = 'duc_con2';
        $new_equipo->valor = 0.92;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Cassette (Hasta 7.5 m)';
        $new_equipo->identificador = 'cass';
        $new_equipo->valor = 0.93;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Cassette (Hasta 15 m)';
        $new_equipo->identificador = 'cass2';
        $new_equipo->valor = 0.94;
        $new_equipo->equipo = 7;
        $new_equipo->save();

        ///unidades presion
        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Condensadora';
        $new_equipo->identificador = 'condensadora_unidad';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 8;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Condensador';
        $new_equipo->identificador = 'condensador_unidad';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 8;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadora';
        $new_equipo->identificador = 'manejadora_unidad';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 8;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Paquete';
        $new_equipo->identificador = 'paquete_unidad';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 8;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Gabinete';
        $new_equipo->identificador = 'gabinete_unidad';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 8;
        $new_equipo->save();

        ////////////////////////chiller scroll

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Aire';
        $new_equipo->identificador = 'enfriado_aire_scroll';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 9;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Agua';
        $new_equipo->identificador = 'enfriado_agua_scroll';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 9;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Portatil (Proceso)';
        $new_equipo->identificador = 'portatil_proceso_scroll';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 9;
        $new_equipo->save();

        ////////////////////////chiller tornillo

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Aire';
        $new_equipo->identificador = 'enfriado_aire_tornillo';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 10;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Agua';
        $new_equipo->identificador = 'enfriado_agua_tornillo';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 10;
        $new_equipo->save();

        ////////////////////////chiller turbocor

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Aire';
        $new_equipo->identificador = 'enfriado_aire_turbocor';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 11;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Enfriado por Agua';
        $new_equipo->identificador = 'enfriado_agua_turbocor';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 11;
        $new_equipo->save();

        ////////////////////////Equipamiento agua fria

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Manejadora';
        $new_equipo->identificador = 'manejadora_equipamiento_agua_fria';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fan Coil LSP';
        $new_equipo->identificador = 'fan_coil_lsp_equipamiento_agua_fria';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Fan Coil M/HSP';
        $new_equipo->identificador = 'fan_coil_hsp_equipamiento_agua_fria';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Bomba de Agua';
        $new_equipo->identificador = 'bomba_agua_equipamiento_agua_fria';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Bomba -Stand by';
        $new_equipo->identificador = 'bomba_standby_equipamiento_agua_fria';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        //////////////////////////////torres  de enfriamiento
        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Abierta';
        $new_equipo->identificador = 'abierta_torres_enfriamiento';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 13;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Cerrada';
        $new_equipo->identificador = 'cerrada_torres_enfriamiento';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 13;
        $new_equipo->save();

        //////////////////////////////ventilacion
        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Extractor Baño';
        $new_equipo->identificador = 'extractor_bano_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Polea';
        $new_equipo->identificador = 'axial_polea_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Directo';
        $new_equipo->identificador = 'axial_directo_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Centífugo Polea';
        $new_equipo->identificador = 'centrifugo_polea_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Centífugo Directo';
        $new_equipo->identificador = 'centrifugo_directo_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Campana (Techo)';
        $new_equipo->identificador = 'campana_techo_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Campana (Pared)';
        $new_equipo->identificador = 'campana_pared_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Eólico';
        $new_equipo->identificador = 'eolico_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'DOA Básica';
        $new_equipo->identificador = 'doa_basica_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'DOA + HR';
        $new_equipo->identificador = 'doa_hr_ventilacion';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 14;
        $new_equipo->save();

        //accesorios
        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Termostato Básico';
        $new_equipo->identificador = 'termostato_basico_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Termostato Inteligente';
        $new_equipo->identificador = 'termostato_inteligente_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Caja VAV Básica';
        $new_equipo->identificador = 'caja_vav_basica_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Caja VAV Avanzada';
        $new_equipo->identificador = 'caja_vav_avanzada_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Damper Manual';
        $new_equipo->identificador = 'damper_manual_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Damper Motorizado';
        $new_equipo->identificador = 'damper_motorizado_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Cortinas de Aire';
        $new_equipo->identificador = 'cortinas_aire_accesorios';
        $new_equipo->valor = 1;
        $new_equipo->equipo = 15;
        $new_equipo->save();


       /*  $equipos = [8,9,10,11];
       for ($i=0; $i < count($equipos) ; $i++) {

            $new_equipo = new UnidadesModel;
            $new_equipo->unidad = 'Confort - Constante';
            $new_equipo->identificador = 'confort_constante_'.$equipos[$i];
            $new_equipo->valor = 0;
            $new_equipo->equipo = $equipos[$i];
            $new_equipo->save();

            $new_equipo = new UnidadesModel;
            $new_equipo->unidad = 'Confort - Variable';
            $new_equipo->identificador = 'confort_variable_'.$equipos[$i];
            $new_equipo->valor = 0;
            $new_equipo->equipo = $equipos[$i];
            $new_equipo->save();

            $new_equipo = new UnidadesModel;
            $new_equipo->unidad = 'Proceso';
            $new_equipo->identificador = 'proceso_'.$equipos[$i];
            $new_equipo->valor = 0;
            $new_equipo->equipo = $equipos[$i];
            $new_equipo->save();
        }

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Directo';
        $new_equipo->identificador = 'axial_directo_extractor';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Polea';
        $new_equipo->identificador = 'axial_polea_extractor';
        $new_equipo->valor = 0.94;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Centrífugo Polea';
        $new_equipo->identificador = 'centrifugo_polea_extractor';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Campana (Techo)';
        $new_equipo->identificador = 'campana_extractor';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 12;
        $new_equipo->save();

        /////

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Directo';
        $new_equipo->identificador = 'axial_directo_inyector';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 13;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Axial Polea';
        $new_equipo->identificador = 'axial_polea_inyector';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 13;
        $new_equipo->save();

        $new_equipo = new UnidadesModel;
        $new_equipo->unidad = 'Centrífugo Polea';
        $new_equipo->identificador = 'centrifugo_polea_inyector';
        $new_equipo->valor = 0;
        $new_equipo->equipo = 13;
        $new_equipo->save(); */

    }
}


