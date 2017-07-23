<?php

namespace App\Repositories;

use App\Repositories\src\Contracts\RepositoryInterface;
use App\Repositories\src\Eloquent\Repository;

class Entries_genreRepository extends Repository{

	function model(){
		return 'App\Entries_genre';
	}
}