<?php

namespace App\Repositories;

use App\Repositories\src\Contracts\RepositoryInterface;
use App\Repositories\src\Eloquent\Repository;

class ActorRepository extends Repository{

	function model(){
		return 'App\Actor';
	}
}