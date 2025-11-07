<?php
namespace App\Repositories;


use App\CategoriaEdificioModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class CategoriaEdificioRepository
{

    public function get_categorias_edificio(){
        $cate_edificio = CategoriaEdificioModel::all();
         return $cate_edificio;
    }
}
