<?php
namespace App\Repositories;


use App\CoordinacionProjectModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class CoordinacionProjectRepository
{

    public function project_edit_coordinacion(int $id_project){
        $project_edit_coordinacion = CoordinacionProjectModel::where('id_project', $id_project)->first();
         return $project_edit_coordinacion;
    }

    public function getTecnicoAyudante($id_project){
        $ta_or_t = CoordinacionProjectModel::where('id_project', $id_project)->first()->personal;
         return $ta_or_t;
    }


}
