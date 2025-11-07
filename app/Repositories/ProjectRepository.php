<?php
namespace App\Repositories;

use App\ProjectsModel;
use App\CategoriaEdificioModel;
use App\CoordinacionProjectModel;
use App\FactorAmbienteModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{

    public function project_edit($id_project){
         $project_edit = ProjectsModel::where('id', $id_project)->first();
         return $project_edit;
    }

    public function project_cat_edificio($id_project){
         $id_cat_edifico = ProjectsModel::where('id', $id_project)->first()->id_cat_edifico;
         return $id_cat_edifico;
    }
}
