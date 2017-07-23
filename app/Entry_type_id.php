<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entry;

class Entry_type_id extends Model
{
    //
    public function entry()
    {
    	return $this->hasMany(Entry::class);
    }
}
