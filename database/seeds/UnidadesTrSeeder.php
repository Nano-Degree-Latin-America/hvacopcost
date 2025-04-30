<?php

use Illuminate\Database\Seeder;
use App\UnidadesTrModel;
class UnidadesTrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //basico
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 1;
        $new_equipo->one = 'NA';
        $new_equipo->two = 8;
        $new_equipo->three = 9;
        $new_equipo->four = 10;
        $new_equipo->five = 11;
        $new_equipo->six = 14;
        $new_equipo->seven = 'NA';
        $new_equipo->eight = 'NA';
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //c/ Economizador
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 2;
        $new_equipo->one = 'NA';
        $new_equipo->two = 8.5;
        $new_equipo->three = 9.5;
        $new_equipo->four = 10.5;
        $new_equipo->five = 11.5;
        $new_equipo->six = 16;
        $new_equipo->seven = 'NA';
        $new_equipo->eight = 'NA';
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //w_heat_rec
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 3;
        $new_equipo->one = 'NA';
        $new_equipo->two = 9;
        $new_equipo->three = 10;
        $new_equipo->four = 11;
        $new_equipo->five = 12;
        $new_equipo->six = 18;
        $new_equipo->seven = 'NA';
        $new_equipo->eight = 'NA';
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

       //mochila_pared
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 4;
       $new_equipo->one = 4;
       $new_equipo->two = 5;
       $new_equipo->three = 5.5;
       $new_equipo->four = 6;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //condensadora_split
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 5;
       $new_equipo->one = 2;
       $new_equipo->two = 2.5;
       $new_equipo->three = 3;
       $new_equipo->four = 3.5;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'S';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //manejadora
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 6;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //manejadora2
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 7;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //fancoil
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 8;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //fancoil2
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 9;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //fancoil_lsp_spt
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 10;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //fancoil_lsp_spt2
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 11;
       $new_equipo->one = null;
       $new_equipo->two = null;
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = 'NA';
       $new_equipo->six = 'NA';
       $new_equipo->seven = 'NA';
       $new_equipo->eight = 'NA';
       $new_equipo->periodo = 'T';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

       //condensadora_vrf_vrv
       $new_equipo = new UnidadesTrModel;
       $new_equipo->id_unidad = 65;
       $new_equipo->one = 'NA';
       $new_equipo->two = 'NA';
       $new_equipo->three = null;
       $new_equipo->four = null;
       $new_equipo->five = null;
       $new_equipo->six = null;
       $new_equipo->seven = null;
       $new_equipo->eight = null;
       $new_equipo->periodo = 'S';
       $new_equipo->id_empresa = 9;
       $new_equipo->save();

        //papisotecho_vrf_vrv
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 66;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //fancoil_lsp_vrf_vrv
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 67;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //fancoil_hsp_vrf_vrv
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 68;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //cassette_vrf_vrv
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 69;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //horz
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 18;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //vert
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 19;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //agu_cir_cer
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 20;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //agu_cir_abr
        $new_equipo = new UnidadesTrModel;
        $new_equipo->id_unidad = 21;
        $new_equipo->one = null;
        $new_equipo->two = null;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->six = null;
        $new_equipo->seven = null;
        $new_equipo->eight = null;
        $new_equipo->periodo = 'T';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

         //condensadora_unidad
         $new_equipo = new UnidadesTrModel;
         $new_equipo->id_unidad = 29;
         $new_equipo->one = null;
         $new_equipo->two = null;
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->six = 'NA';
         $new_equipo->seven = 'NA';
         $new_equipo->eight = 'NA';
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //condensador_unidad
         $new_equipo = new UnidadesTrModel;
         $new_equipo->id_unidad = 30;
         $new_equipo->one = null;
         $new_equipo->two = null;
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->six = 'NA';
         $new_equipo->seven = 'NA';
         $new_equipo->eight = 'NA';
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //manejadora_unidad
         $new_equipo = new UnidadesTrModel;
         $new_equipo->id_unidad = 31;
         $new_equipo->one = null;
         $new_equipo->two = null;
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->six = 'NA';
         $new_equipo->seven = 'NA';
         $new_equipo->eight = 'NA';
         $new_equipo->periodo = 'T';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

          //paquete_unidad
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 32;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //gabinete_unidad
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 33;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //condensadora_minisplit
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 22;
          $new_equipo->one = 2;
          $new_equipo->two = 2;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //pa_pi_te
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 23;
          $new_equipo->one = 2;
          $new_equipo->two = 2;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //pa_pi_te2
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 24;
          $new_equipo->one = 2.5;
          $new_equipo->two = 2.5;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //duc_con
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 25;
          $new_equipo->one = 2.5;
          $new_equipo->two = 2;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //duc_con2
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 26;
          $new_equipo->one = 3;
          $new_equipo->two = 2.5;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //cass
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 27;
          $new_equipo->one = 2;
          $new_equipo->two = 2;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //cass2
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 28;
          $new_equipo->one = 2.5;
          $new_equipo->two = 2.5;
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = 'NA';
          $new_equipo->seven = 'NA';
          $new_equipo->eight = 'NA';
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_aire_scroll
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 34;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_agua_scroll
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 35;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //portatil_proceso_scroll
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 36;
          $new_equipo->one = 'NA';
          $new_equipo->two = 'NA';
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_aire_tornillo
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 37;
          $new_equipo->one = 'NA';
          $new_equipo->two = 'NA';
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_agua_tornillo
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 38;
          $new_equipo->one = 'NA';
          $new_equipo->two = 'NA';
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_aire_turbocor
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 39;
          $new_equipo->one = 'NA';
          $new_equipo->two = 'NA';
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //enfriado_agua_turbocor
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 40;
          $new_equipo->one = 'NA';
          $new_equipo->two = 'NA';
          $new_equipo->three = 'NA';
          $new_equipo->four = 'NA';
          $new_equipo->five = 'NA';
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //manejadora_equipamiento_agua_fria
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 41;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //fan_coil_lsp_equipamiento_agua_fria
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 42;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //fan_coil_hsp_equipamiento_agua_fria
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 43;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //bomba_agua_equipamiento_agua_fria
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 44;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //bomba_standby_equipamiento_agua_fria
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 45;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'S';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //abierta_torres_enfriamiento
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 46;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();

          //cerrada_torres_enfriamiento
          $new_equipo = new UnidadesTrModel;
          $new_equipo->id_unidad = 47;
          $new_equipo->one = null;
          $new_equipo->two = null;
          $new_equipo->three = null;
          $new_equipo->four = null;
          $new_equipo->five = null;
          $new_equipo->six = null;
          $new_equipo->seven = null;
          $new_equipo->eight = null;
          $new_equipo->periodo = 'T';
          $new_equipo->id_empresa = 9;
          $new_equipo->save();


    }
}
