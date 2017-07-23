<?php

namespace App\Repositories;

use App\Repositories\src\Contracts\RepositoryInterface;
use App\Repositories\src\Eloquent\Repository;

class EntryRepository extends Repository{

	function model(){
		return 'App\Entry';
	}
}