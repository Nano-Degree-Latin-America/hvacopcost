<?php
namespace App\Repositories;

use App\SistemasModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class SistemasRepository
{

    public function traer_sistemas_calculo_coordinacion(int $id){
        $sistema = SistemasModel::where('id',$id)->first()->name;
        return $sistema;
    }
}
