<?php

use Illuminate\Database\Seeder;
use App\ControlesModel;
class ControlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //basico}
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->referencia = 'basico';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //c_economizador
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->referencia = 'c_economizador';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //w_heat_rec
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->referencia = 'w_heat_rec';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //manejadora
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 4;
        $new_equipo->referencia = 'manejadora';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //manejadora2
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 5;
        $new_equipo->referencia = 'manejadora2';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //fancoil
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 6;
        $new_equipo->referencia = 'fancoil';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //fancoil2
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 7;
        $new_equipo->referencia = 'fancoil2';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //fancoil_lsp_spt
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 8;
        $new_equipo->referencia = 'fancoil_lsp_spt';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //fancoil_lsp_spt2
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 9;
        $new_equipo->referencia = 'fancoil_lsp_spt2';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //ca_pi_te
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 10;
        $new_equipo->referencia = 'ca_pi_te';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.94;
        $new_equipo->save();

        //fancoil_lsp
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 11;
        $new_equipo->referencia = 'fancoil_lsp';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //ca
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 12;
        $new_equipo->referencia = 'ca';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.94;
        $new_equipo->save();

        //man
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 13;
        $new_equipo->referencia = 'man';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //fancoil_hsp
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 14;
        $new_equipo->referencia = 'fancoil_hsp';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //man_doa_hr
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->control = 'Termostato Inteligente Fuera Zona';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 15;
        $new_equipo->referencia = 'man_doa_hr';
        $new_equipo->control = 'Termostato en Red / DDC en Zona';
        $new_equipo->valor = 0.93;
        $new_equipo->save();

        //horz
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 16;
        $new_equipo->referencia = 'horz';
        $new_equipo->control = 'Termostato Interno';
        $new_equipo->valor = 1.04;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 16;
        $new_equipo->referencia = 'horz';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 16;
        $new_equipo->referencia = 'horz';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

        //vert
        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 17;
        $new_equipo->referencia = 'vert';
        $new_equipo->control = 'Termostato Fuera Zona de Confort';
        $new_equipo->valor = 1.06;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 17;
        $new_equipo->referencia = 'vert';
        $new_equipo->control = 'Termostato en Zona de Confort';
        $new_equipo->valor = 1;
        $new_equipo->save();

        $new_equipo = new ControlesModel;
        $new_equipo->id_unidad = 17;
        $new_equipo->referencia = 'vert';
        $new_equipo->control = 'Termostato Inteligente en Zona';
        $new_equipo->valor = 0.95;
        $new_equipo->save();

         //agu_cir_cer
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 18;
         $new_equipo->referencia = 'agu_cir_cer';
         $new_equipo->control = 'Termostato Fuera Zona de Confort';
         $new_equipo->valor = 1.06;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 18;
         $new_equipo->referencia = 'agu_cir_cer';
         $new_equipo->control = 'Termostato en Zona de Confort';
         $new_equipo->valor = 1;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 18;
         $new_equipo->referencia = 'agu_cir_cer';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.95;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 18;
         $new_equipo->referencia = 'agu_cir_cer';
         $new_equipo->control = 'Termostato en Red / DDC en Zona';
         $new_equipo->valor = 0.93;
         $new_equipo->save();

         //agu_cir_abr
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 19;
         $new_equipo->referencia = 'agu_cir_abr';
         $new_equipo->control = 'Termostato Fuera Zona de Confort';
         $new_equipo->valor = 1.06;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 19;
         $new_equipo->referencia = 'agu_cir_abr';
         $new_equipo->control = 'Termostato en Zona de Confort';
         $new_equipo->valor = 1;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 19;
         $new_equipo->referencia = 'agu_cir_abr';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.95;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 19;
         $new_equipo->referencia = 'agu_cir_abr';
         $new_equipo->control = 'Termostato en Red / DDC en Zona';
         $new_equipo->valor = 0.93;
         $new_equipo->save();

         //pa_pi_te
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 20;
         $new_equipo->referencia = 'pa_pi_te';
         $new_equipo->control = 'Termostato Interno';
         $new_equipo->valor = 1.04;
         $new_equipo->save();

         //pa_pi_te2
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 21;
         $new_equipo->referencia = 'pa_pi_te2';
         $new_equipo->control = 'Termostato Interno';
         $new_equipo->valor = 1.04;
         $new_equipo->save();

         //duc_con
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 22;
         $new_equipo->referencia = 'duc_con';
         $new_equipo->control = 'Termostato Inteligente Fuera Zona';
         $new_equipo->valor = 1.06;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 22;
         $new_equipo->referencia = 'duc_con';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.94;
         $new_equipo->save();

         //duc_con2
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 23;
         $new_equipo->referencia = 'duc_con2';
         $new_equipo->control = 'Termostato Inteligente Fuera Zona';
         $new_equipo->valor = 1.06;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 23;
         $new_equipo->referencia = 'duc_con2';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.94;
         $new_equipo->save();

         //cass
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 24;
         $new_equipo->referencia = 'cass';
         $new_equipo->control = 'Termostato Interno';
         $new_equipo->valor = 1.04;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 24;
         $new_equipo->referencia = 'cass';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.94;
         $new_equipo->save();

         //cass2
         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 25;
         $new_equipo->referencia = 'cass2';
         $new_equipo->control = 'Termostato Interno';
         $new_equipo->valor = 1.04;
         $new_equipo->save();

         $new_equipo = new ControlesModel;
         $new_equipo->id_unidad = 25;
         $new_equipo->referencia = 'cass2';
         $new_equipo->control = 'Termostato Inteligente en Zona';
         $new_equipo->valor = 0.94;
         $new_equipo->save();
    }
}
