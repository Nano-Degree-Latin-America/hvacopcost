<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEdificioModel extends Model
{
    protected $table ="tipo_edificio";
    protected $fillable = ['name','uno_a','dos_a','dos_b','tres_a','tres_b','tres_b_coast','tres_c','energy_star','kwh_yr','status','id_categoria'];
}
