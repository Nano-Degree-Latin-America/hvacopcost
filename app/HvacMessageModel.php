<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HvacMessageModel extends Model
{
     //
    protected $table ="messages";

    protected $fillable = ['conversation_id','content','role'];

}
