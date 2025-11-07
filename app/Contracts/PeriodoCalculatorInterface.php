<?php
namespace App\Contracts;

interface PeriodoCalculatorInterface
{
    public function calcular(int $idSistema, ?string $unidadIdentificador): ?string;
}
