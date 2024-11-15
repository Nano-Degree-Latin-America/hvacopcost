<?php

use Illuminate\Database\Seeder;
use App\DisenoModel;
class DisenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->diseno = 'VAV y Retorno Ductado';
        $new_equipo->valor = -0.2;
        $new_equipo->save();

        ///economizador

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->diseno = 'VAV y Retorno Ductado';
        $new_equipo->valor = -0.2;
        $new_equipo->save();

        //w_heat_rec

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->diseno = 'VAV y Retorno Ductado';
        $new_equipo->valor = -0.2;
        $new_equipo->save();

        //manejadora
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.11;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();


        //manejadora2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.11;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //fancoil
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //fancoil2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //fancoil_lsp_spt
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.06;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        //fancoil_lsp_spt2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->diseno = 'Descarga Directa Sin Ductar';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.06;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        //ca_pi_te
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->diseno = 'Sin Unidad DOA';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->diseno = 'Con Unidad DOA';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->diseno = 'Unidad DOA + Heat Recovery';
        $new_equipo->valor = -0.05;
        $new_equipo->save();

        //fancoil_lsp
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->diseno = 'Sin Unidad DOA';
        $new_equipo->valor = 0.08;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->diseno = 'Con DOA y Descarga Ductada';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->diseno = 'Unidad DOA + Heat Recovery';
        $new_equipo->valor = -0.05;
        $new_equipo->save();

        //ca
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->diseno = 'Sin Unidad DOA';
        $new_equipo->valor = 0.16;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->diseno = 'Con Unidad DOA';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->diseno = 'Unidad DOA + Heat Recovery';
        $new_equipo->valor = -0.05;
        $new_equipo->save();

        //man
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.06;
        $new_equipo->save();

        //fancoil_hsp
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->diseno = 'Ducto Flex. y Retorno Ductado';
        $new_equipo->valor = 0.05;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        //man_doa_hr
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->diseno = 'Descarga Directa Ductada';
        $new_equipo->valor = 0.06;
        $new_equipo->save();

        //horz
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 16;
        $new_equipo->referencia = 'horz';
        $new_equipo->diseno = 'Filtros Aire MERV < 7';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 16;
        $new_equipo->referencia = 'horz';
        $new_equipo->diseno = 'Filtros Aire MERV > 7';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //vert
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 17;
        $new_equipo->referencia = 'vert';
        $new_equipo->diseno = 'Descarga Ductada c/ MERV < 7';
        $new_equipo->valor = 0.1;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 17;
        $new_equipo->referencia = 'vert';
        $new_equipo->diseno = 'Descarga Ductada c/ MERV > 7';
        $new_equipo->valor = -0.1;
        $new_equipo->save();

        //agu_cir_cer
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 18;
        $new_equipo->referencia = 'agu_cir_cer';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 18;
        $new_equipo->referencia = 'agu_cir_cer';
        $new_equipo->diseno = 'Inyección y Retorno Flexible';
        $new_equipo->valor = 0.09;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 18;
        $new_equipo->referencia = 'agu_cir_cer';
        $new_equipo->diseno = 'Inyección Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        //agu_cir_abr
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 19;
        $new_equipo->referencia = 'agu_cir_abr';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 19;
        $new_equipo->referencia = 'agu_cir_abr';
        $new_equipo->diseno = 'Inyección y Retorno Flexible';
        $new_equipo->valor = 0.09;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 19;
        $new_equipo->referencia = 'agu_cir_abr';
        $new_equipo->diseno = 'Inyección Flex. y Plenum Retorno';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        //pa_pi_te
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 20;
        $new_equipo->referencia = 'pa_pi_te';
        $new_equipo->diseno = 'Condensador Arriba';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =20;
        $new_equipo->referencia = 'pa_pi_te';
        $new_equipo->diseno = 'Condensador Abajo';
        $new_equipo->valor = 0.1;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 20;
        $new_equipo->referencia = 'pa_pi_te';
        $new_equipo->diseno = 'Espalda con Espalda';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //pa_pi_te2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 21;
        $new_equipo->referencia = 'pa_pi_te2';
        $new_equipo->diseno = 'Condensador Arriba';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =21;
        $new_equipo->referencia = 'pa_pi_te2';
        $new_equipo->diseno = 'Condensador Abajo';
        $new_equipo->valor = 0.1;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 21;
        $new_equipo->referencia = 'pa_pi_te2';
        $new_equipo->diseno = 'Espalda con Espalda';
        $new_equipo->valor = 0;
        $new_equipo->save();

        //duc_con
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 22;
        $new_equipo->referencia = 'duc_con';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =22;
        $new_equipo->referencia = 'duc_con';
        $new_equipo->diseno = 'Inyección Ductada y Plenum Retorno';
        $new_equipo->valor = 0.07;
        $new_equipo->save();

        //duc_con2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 23;
        $new_equipo->referencia = 'duc_con2';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =23;
        $new_equipo->referencia = 'duc_con2';
        $new_equipo->diseno = 'Inyección Ductada y Plenum Retorno';
        $new_equipo->valor = 0.07;
        $new_equipo->save();

        //cass
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 24;
        $new_equipo->referencia = 'cass';
        $new_equipo->diseno = 'Condensador Arriba';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =24;
        $new_equipo->referencia = 'cass';
        $new_equipo->diseno = 'Condensador Abajo';
        $new_equipo->valor = 0.1;
        $new_equipo->save();

        //cass2
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 25;
        $new_equipo->referencia = 'cass2';
        $new_equipo->diseno = 'Condensador Arriba';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =25;
        $new_equipo->referencia = 'cass2';
        $new_equipo->diseno = 'Condensador Abajo';
        $new_equipo->valor = 0.1;
        $new_equipo->save();

       /*  //man_scholl_const
        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad = 27;
        $new_equipo->referencia = 'man_scholl_const';
        $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
        $new_equipo->valor = 0.19;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =27;
        $new_equipo->referencia = 'man_scholl_const';
        $new_equipo->diseno = 'Inyección y Retorno Flexible';
        $new_equipo->valor = 0.12;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =27;
        $new_equipo->referencia = 'man_scholl_const';
        $new_equipo->diseno = 'Inyección y Retorno Ductado';
        $new_equipo->valor = 0;
        $new_equipo->save();

        $new_equipo = new DisenoModel;
        $new_equipo->id_unidad =27;
        $new_equipo->referencia = 'man_scholl_const';
        $new_equipo->diseno = 'VAV y Retorno Ductado';
        $new_equipo->valor = -0.15;
        $new_equipo->save();

         //fan_hsp_scholl_const
         $new_equipo = new DisenoModel;
         $new_equipo->id_unidad = 28;
         $new_equipo->referencia = 'fan_hsp_scholl_const';
         $new_equipo->diseno = 'Ducto Flex. y Plenum Retorno';
         $new_equipo->valor = 0.19;
         $new_equipo->save();

         $new_equipo = new DisenoModel;
         $new_equipo->id_unidad =28;
         $new_equipo->referencia = 'fan_hsp_scholl_const';
         $new_equipo->diseno = 'Inyección y Retorno Flexible';
         $new_equipo->valor = 0.12;
         $new_equipo->save();

         $new_equipo = new DisenoModel;
         $new_equipo->id_unidad =28;
         $new_equipo->referencia = 'fan_hsp_scholl_const';
         $new_equipo->diseno = 'Inyección y Retorno Ductado';
         $new_equipo->valor = 0;
         $new_equipo->save(); */

    }
}
