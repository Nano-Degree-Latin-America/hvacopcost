<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiempoPorcentModel extends Model
{
    protected $table ="tiempo_porcent";
    protected $fillable = ['id_edificio','porcent_1','porcent_2','porcent_3'];

}
