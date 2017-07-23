<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
     public function entry(){
        return $this->belongsToMany('App\Entry','entries_actors');
    }

}
