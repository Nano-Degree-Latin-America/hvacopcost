<?php
namespace App\Repositories;

use App\EquipoCoordinacionModel;
use Illuminate\Database\Eloquent\Collection;

class EquipoCoordinacionRepository
{
    public function getByProject(int $projectId): Collection
    {
        return EquipoCoordinacionModel::where('id_project', $projectId)->get();
    }

    public function find(int $id): ?EquipoCoordinacionModel
    {
        return EquipoCoordinacionModel::find($id);
    }

    public function create(array $data): EquipoCoordinacionModel
    {
        $m = new EquipoCoordinacionModel();
        $m->fill($data);
        $m->save();
        return $m;
    }

    public function updateField(int $id, string $field, $value): bool
    {
        $m = $this->find($id);
        if (!$m) return false;
        $m->$field = $value;
        return $m->save();
    }

    public function updateCantidadTotal(int $id): bool
    {
        $m = $this->find($id);
        if (!$m) return false;
        $m->cantidad_total = (int)($m->capacidad) * (int)($m->cantidad);
        return $m->save();
    }

}
