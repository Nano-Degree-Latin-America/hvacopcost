<?php
namespace App\Repositories;

use App\CoordinacionMantenimientoModel;
use Illuminate\Support\Collection;

class TecnicoAyudanteRepository
{
    public function getByEquipo(int $idCoordinacion): Collection
    {
        return CoordinacionMantenimientoModel::where('id_coordinacion', $idCoordinacion)
            ->orderBy('id', 'asc')->get();
    }

    public function insertBulk(array $rows): bool
    {
        return CoordinacionMantenimientoModel::insert($rows);
    }

    public function deleteByIds(array $ids): int
    {
        return CoordinacionMantenimientoModel::whereIn('id', $ids)->delete();
    }

    public function updateVisitaYTotal(int $id, string $visita, int $value): ?CoordinacionMantenimientoModel
    {
        $val = $this->calculateValueCoordinacion($value);
        $m = CoordinacionMantenimientoModel::find($id);
        if (!$m) return null;

        $m->$visita = $value;
        $total = 0;
        for ($i = 1; $i <= 12; $i++) {
            $prop = 'visita_' . $i;
            $total += (int)($m->$prop);
        }
        $m->total_horas = $total;
        $m->save();
        return $m;
    }

}
