<?php

use Illuminate\Database\Seeder;
use App\ConfiguracionesMantenimientoModel;
use App\EmpresasModel;

class ConfiguracionesMantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $empresas = EmpresasModel::all();

        foreach ($empresas as $key => $empresa) {

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'Mano Obra Técnico';
            $new_configuracion->valor = 12.00;
            $new_configuracion->unidad = '$/Hr';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'MO Técnico y Ayudante';
            $new_configuracion->valor = 17.00;
            $new_configuracion->unidad = '$/Hr';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'Horas útiles día';
            $new_configuracion->valor = 7;
            $new_configuracion->unidad = 'Hrs/día';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'Valor Burden';
            $new_configuracion->valor = 9.00;
            $new_configuracion->unidad = '$/Hr';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'Valor Vehículo';
            $new_configuracion->valor = 2;
            $new_configuracion->unidad = '$/Km';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();

            $new_configuracion = new ConfiguracionesMantenimientoModel;
            $new_configuracion->configuracion = 'Segurista / Supervisor';
            $new_configuracion->valor = 15.00;
            $new_configuracion->unidad = '$/Hr';
            $new_configuracion->id_empresa = $empresa->id;
            $new_configuracion->save();
        }
    }
}
