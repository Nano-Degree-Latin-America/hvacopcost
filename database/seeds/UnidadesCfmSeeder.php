<?php

use Illuminate\Database\Seeder;
use App\UnidadesCfmModel;
class UnidadesCfmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //extractor_bano_ventilacion
        $new_equipo = new UnidadesCfmModel;
        $new_equipo->id_unidad = 48;
        $new_equipo->one = 1;
        $new_equipo->two = 2;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //axial_polea_ventilacion
        $new_equipo = new UnidadesCfmModel;
        $new_equipo->id_unidad = 49;
        $new_equipo->one = 'NA';
        $new_equipo->two = 2;
        $new_equipo->three = null;
        $new_equipo->four = null;
        $new_equipo->five = null;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

         //axial_directo_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 50;
         $new_equipo->one = 1;
         $new_equipo->two = 2;
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //centrifugo_polea_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 51;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //centrifugo_directo_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 52;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //campana_techo_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 53;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //campana_pared_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 54;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //eolico_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 55;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'S';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //doa_basica_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 56;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'T';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

         //doa_hr_ventilacion
         $new_equipo = new UnidadesCfmModel;
         $new_equipo->id_unidad = 57;
         $new_equipo->one = 'NA';
         $new_equipo->two = 'NA';
         $new_equipo->three = null;
         $new_equipo->four = null;
         $new_equipo->five = null;
         $new_equipo->periodo = 'T';
         $new_equipo->id_empresa = 9;
         $new_equipo->save();

    }
}
