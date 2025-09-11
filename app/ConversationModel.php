<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationModel extends Model
{
    //
    protected $table ="conversations";

     protected $fillable = ['conversation_id','user_id'];

     public function messages(){
            return $this->hasMany(HvacMessageModel::class, 'conversation_id');
    }
}
