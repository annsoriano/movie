<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entry_type_id;
use App\User;
use App\Genre;
use App\Actor;

class Entry extends Model
{
    //
    public function entry_type_id()
    {
    	return $this->belongsTo('App\Entry_type_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Genre','entries_genres');
    }

    public function actor()
    {
        return $this->belongsToMany('App\Actor','entries_actors');
    }


    protected $fillable =['title','release_year','synopsis','rating','entry_type_id_id','image_url'];
}
