<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
     public function entry(){
        return $this->belongsToMany('App\Entry','entries_genres');
    }
}
