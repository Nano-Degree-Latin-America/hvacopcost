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
        // Mapeo de identificadores a configuraciones de costo y RAV
        $configurations = [
            'basico' => ['costo_instalacion' => 2000, 'rav' => 3.5],
            'c_economizador' => ['costo_instalacion' => 2200, 'rav' => 3.5],
            'w_heat_rec' => ['costo_instalacion' => 2500, 'rav' => 3.5],
            'mochila_pared' => ['costo_instalacion' => 1200, 'rav' => 3.5],
            'manejadora' => ['costo_instalacion' => 1500, 'rav' => 4.0],
            'manejadora2' => ['costo_instalacion' => 1500, 'rav' => 4.0],
            'fancoil' => ['costo_instalacion' => 1800, 'rav' => 4.0],
            'fancoil2' => ['costo_instalacion' => 1800, 'rav' => 4.0],
            'fancoil_lsp_spt' => ['costo_instalacion' => 1800, 'rav' => 4.0],
            'fancoil_lsp_spt2' => ['costo_instalacion' => 1800, 'rav' => 4.0],
            'ca_pi_te' => ['costo_instalacion' => 1500, 'rav' => 4.5],
            'fancoil_lsp' => ['costo_instalacion' => 1800, 'rav' => 4.5],
            'ca' => ['costo_instalacion' => 2200, 'rav' => 4.5],
            'man' => ['costo_instalacion' => 2400, 'rav' => 4.5],
            'fancoil_hsp' => ['costo_instalacion' => 1700, 'rav' => 4.5],
            'man_doa_hr' => ['costo_instalacion' => 1700, 'rav' => 4.5],
            'horz' => ['costo_instalacion' => 1000, 'rav' => 3.5],
            'vert' => ['costo_instalacion' => 1100, 'rav' => 3.5],
            'agu_cir_cer' => ['costo_instalacion' => 1950, 'rav' => 4.0],
            'agu_cir_abr' => ['costo_instalacion' => 2100, 'rav' => 4.0],
            'pa_pi_te' => ['costo_instalacion' => 800, 'rav' => 4.0],
            'pa_pi_te2' => ['costo_instalacion' => 800, 'rav' => 4.0],
            'duc_con' => ['costo_instalacion' => 900, 'rav' => 4.0],
            'duc_con2' => ['costo_instalacion' => 900, 'rav' => 4.0],
            'condensadora_unidad' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'condensador_unidad' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'manejadora_unidad' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'paquete_unidad' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'gabinete_unidad' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'enfriado_aire_scroll' => ['costo_instalacion' => 1020, 'rav' => 4.0],
            'enfriado_agua_scroll' => ['costo_instalacion' => 1050, 'rav' => 4.0],
            'portatil_proceso_scroll' => ['costo_instalacion' => 1100, 'rav' => 4.0],
            'enfriado_aire_tornillo' => ['costo_instalacion' => 1200, 'rav' => 4.5],
            'enfriado_agua_tornillo' => ['costo_instalacion' => 1300, 'rav' => 4.5],
            'enfriado_aire_turbocor' => ['costo_instalacion' => 1190, 'rav' => 4.5],
            'enfriado_agua_turbocor' => ['costo_instalacion' => 1285, 'rav' => 4.5],
            'manejadora_equipamiento_agua_fria' => ['costo_instalacion' => 500, 'rav' => 4.0],
            'fan_coil_lsp_equipamiento_agua_fria' => ['costo_instalacion' => 500, 'rav' => 4.0],
            'fan_coil_hsp_equipamiento_agua_fria' => ['costo_instalacion' => 500, 'rav' => 4.0],
            'bomba_agua_equipamiento_agua_fria' => ['costo_instalacion' => 501, 'rav' => 104.0],
            'bomba_standby_equipamiento_agua_fria' => ['costo_instalacion' => 500, 'rav' => 4.0],
            'abierta_torres_enfriamiento' => ['costo_instalacion' => 1100, 'rav' => 6.0],
            'cerrada_torres_enfriamiento' => ['costo_instalacion' => 1200, 'rav' => 6.0],
            'extractor_bano_ventilacion' => ['costo_instalacion' => 1.00, 'rav' => 3.5],
            'axial_polea_ventilacion' => ['costo_instalacion' => 0.90, 'rav' => 3.5],
            'axial_directo_ventilacion' => ['costo_instalacion' => 0.80, 'rav' => 3.5],
            'centrifugo_polea_ventilacion' => ['costo_instalacion' => 1.10, 'rav' => 3.5],
            'centrifugo_directo_ventilacion' => ['costo_instalacion' => 1.15, 'rav' => 3.5],
            'campana_techo_ventilacion' => ['costo_instalacion' => 1.30, 'rav' => 3.5],
            'campana_pared_ventilacion' => ['costo_instalacion' => 1.38, 'rav' => 3.5],
            'eolico_ventilacion' => ['costo_instalacion' => 1.00, 'rav' => 3.5],
            'doa_basica_ventilacion' => ['costo_instalacion' => 1.40, 'rav' => 3.5],
            'doa_hr_ventilacion' => ['costo_instalacion' => 1.55, 'rav' => 3.5],
            'termostato_basico_accesorios' => ['costo_instalacion' => 7.00, 'rav' => 100.0],
            'termostato_inteligente_accesorios' => ['costo_instalacion' => 25.00, 'rav' => 100.0],
            'caja_vav_basica_accesorios' => ['costo_instalacion' => 20.00, 'rav' => 100.0],
            'caja_vav_avanzada_accesorios' => ['costo_instalacion' => 24.00, 'rav' => 100.0],
            'damper_manual_accesorios' => ['costo_instalacion' => 15.00, 'rav' => 100.0],
            'damper_motorizado_accesorios' => ['costo_instalacion' => 45.00, 'rav' => 100.0],
            'cortinas_aire_accesorios' => ['costo_instalacion' => 15.00, 'rav' => 100.0],

            'condensadora_vrf_vrv' => ['costo_instalacion' => 1499, 'rav' => 4.5],
            'papisotecho_vrf_vrv' => ['costo_instalacion' => 1500, 'rav' => 4.5],
            'fancoil_lsp_vrf_vrv' => ['costo_instalacion' => 1800, 'rav' => 4.5],
            'fancoil_hsp_vrf_vrv' => ['costo_instalacion' => 1700, 'rav' => 4.5],
            'cassette_vrf_vrv' => ['costo_instalacion' => 2200, 'rav' => 4.5],
            'manejadora_vrf_vrv' => ['costo_instalacion' => 2400, 'rav' => 4.5],

        ];

        // Obtener todas las unidades
        $unidades_aux = UnidadesModel::get();

        foreach ($unidades_aux as $unidad_aux) {
            $new_equipo = new BaseCalculoModel;
            $new_equipo->sistema = $unidad_aux->equipo;
            $new_equipo->id_unidad = $unidad_aux->id;

            // Asignar configuración basada en el identificador
            if (isset($configurations[$unidad_aux->identificador])) {
                $new_equipo->costo_instalacion = $configurations[$unidad_aux->identificador]['costo_instalacion'];
                $new_equipo->rav = $configurations[$unidad_aux->identificador]['rav'];
            } else {
                // Valores predeterminados si no hay configuración específica
                $new_equipo->costo_instalacion = 0;
                $new_equipo->rav = 0;
            }

            // Asignar unidad de costo de instalación
            $new_equipo->unidad_costo_instalacion = ($unidad_aux->equipo == 12 || $unidad_aux->equipo == 13) ? '$/cfm' : '$/TR';

            // Guardar el nuevo equipo
            $new_equipo->save();
        }
    }
}
