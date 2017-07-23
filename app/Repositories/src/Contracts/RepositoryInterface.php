<?php

namespace App\Repositories\src\Contracts;

interface RepositoryInterface{

	public function all($columns = array('*'));

	public function paginate($perpage=10, $columns = array('*'));

	public function create(array $data);

	public function update(array $data, $id);

	public function delete($id);

	public function find($id, $columns = array('*'));

	public function findBy($attribute, $value, $columns = array('*'));

}