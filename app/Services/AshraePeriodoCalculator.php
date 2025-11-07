<?php
namespace App\Services;

use App\Contracts\PeriodoCalculatorInterface;
use App\SistemasModel;
use App\UnidadesModel;
use App\UnidadesTrModel;
use App\UnidadesCfmModel;
use App\UnidadesUnidadModel;

class AshraePeriodoCalculator implements PeriodoCalculatorInterface
{
    public function calcular(int $idSistema, ?string $unidadIdentificador): ?string
    {
        $sistema = SistemasModel::find($idSistema)->name;
        if (!$sistema || !$unidadIdentificador) return null;

        $idUnidad = UnidadesModel::where('identificador', $unidadIdentificador)->value('id');
        if (!$idUnidad) return null;

        switch ($sistema) {
            case 'Ventilación':
                return UnidadesCfmModel::where('id_unidad', $idUnidad)->value('periodo');
            case 'Accesorios':
                return UnidadesUnidadModel::where('id_unidad', $idUnidad)->value('periodo');
            default:
                return UnidadesTrModel::where('id_unidad', $idUnidad)->value('periodo');
        }
    }
}
