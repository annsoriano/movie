<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entries_actor extends Model
{
     public function entry(){
        return $this->hasMany('App\Entry','entries');
    }

     public function actor(){
        return $this->hasMany('App\Actor','actors');
    }

    protected $fillable=['actor_id','entry_id'];
}
