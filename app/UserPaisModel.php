<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaisModel extends Model
{
    protected $table ="user_pais";

    protected $fillable = [
        'id_user', 'pais'
    ];
}
