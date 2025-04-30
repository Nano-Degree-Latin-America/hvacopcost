<?php

use Illuminate\Database\Seeder;
use App\UnidadesUnidadModel;
class UnidadesUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //termostato_basico_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 58;
        $new_equipo->one = 0.5;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //termostato_inteligente_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 59;
        $new_equipo->one = 0.75;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //caja_vav_basica_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 60;
        $new_equipo->one = 1;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //caja_vav_avanzada_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 61;
        $new_equipo->one = 1.5;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //damper_manual_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 62;
        $new_equipo->one = 0.5;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //damper_motorizado_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 63;
        $new_equipo->one = 1;
        $new_equipo->periodo = 'A';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();

        //damper_motorizado_accesorios
        $new_equipo = new UnidadesUnidadModel;
        $new_equipo->id_unidad = 64;
        $new_equipo->one = 2;
        $new_equipo->periodo = 'S';
        $new_equipo->id_empresa = 9;
        $new_equipo->save();
    }
}
