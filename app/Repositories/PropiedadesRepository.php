<?php
namespace App\Repositories;

use App\PropiedadesModel;
use Illuminate\Support\Collection;

class PropiedadesRepository{
    public function getPropiedades($id_cliente){
        return PropiedadesModel::join('clientes', 'propiedades.id_cliente', '=', 'clientes.id')
        ->join('categorias_edificios','categorias_edificios.id','=','propiedades.categoria')
        ->where('id_cliente','=',$id_cliente)
        ->select('propiedades.*','clientes.name as cliente_name','categorias_edificios.name as categorias_edificios_name')
        ->get();
    }
    public function getPropiedadesGeneral($id_empresa){
        return PropiedadesModel::join('categorias_edificios','categorias_edificios.id','=','propiedades.categoria')
        ->where('id_empresa','=',$id_empresa)
        ->select('propiedades.*','categorias_edificios.name as categorias_edificios_name')
        ->get();
    }
    public function getPropiedad($id)
    {
        return PropiedadesModel::where('id','=',$id)
        ->first();
    }
}
