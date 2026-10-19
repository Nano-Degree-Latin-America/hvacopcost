<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropiedadesModel extends Model
{
    use SoftDeletes;
    protected $table ="propiedades";
}
