<?php

namespace App\Repositories;

use App\Repositories\src\Contracts\RepositoryInterface;
use App\Repositories\src\Eloquent\Repository;

class Entry_type_idRepository extends Repository{

	function model(){
		return 'App\Entry_type_id';
	}
}