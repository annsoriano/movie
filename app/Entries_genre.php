<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entries_genre extends Model
{
     public function entry(){
        return $this->hasMany('App\Entry','entries');
    }

     public function genre(){
        return $this->hasMany('App\Genre','genres');
    }

    protected $fillable=['genre_id','entry_id'];
}
