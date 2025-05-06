<?php 

namespace App\Repositories;

interface AppRepositoryInterface {

    public function store(array $attributes, $id = null); 
    
    public function find($perPage = 3);

    public function findById($id);
    
    public function filter($filter, $paginate = true, $perPage = 3); 

    public function delete($id);


}