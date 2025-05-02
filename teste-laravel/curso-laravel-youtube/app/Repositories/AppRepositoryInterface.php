<?php 

namespace App\Repositories;

interface AppRepositoryInterface {

    public function store(array $attributes, $id = null); 
    
    public function find();

    public function findById($id);
    
    public function filter($filter); 

    public function delete($id);


}