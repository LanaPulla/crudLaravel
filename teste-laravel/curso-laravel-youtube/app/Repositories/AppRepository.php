<?php

namespace App\Repositories;

use App\Models\App;
use Illuminate\Support\Facades\DB;

class AppRepository implements AppRepositoryInterface{

    private $model;

    public function __construct(App $model)
    {
        $this->model = $model;
    }

    public function store(array $attributes, $id = null){

        if($id != null){
           $nome = $this->findById($id);
           $nome->fill($attributes);
           $nome->save();
        }
        else{
            $nome = $this->model->create((array) $attributes);
        }
        return $nome;
    }

    public function find(){
    //    return App::all();

        return $this->model->all();
    }

    public function findById($id){

        $search = $this->model->newQuery();

        return $search->where('id', '=', $id)->first();

 
         // return $this->model->all();
     }

    public function delete($id){
      
        $this->model->findOrFail($id)->delete();

    }

    public function filter($filter)
    {
       
        $search = $this->model->newQuery();
        // return $search
        //             ->where(DB::raw("UPPER(name)"), 'like', '%' . $filter . '%')
        //             ->get();

         return $search
                    ->where(DB::raw("UPPER(name)"), 'LIKE', '%' . mb_strtoupper(str_replace(' ', '%', trim($filter))) . '%')
                   ->get();

        // return $search
        //             ->where(DB::raw("UPPER(name)"), 'LIKE', '%' . mb_strtoupper(trim($filter)) . '%')
        //            ->get();

        // return $search
        //             ->where(DB::raw("UPPER(name)"), '=', mb_strtoupper(str_replace(' ', '%', trim($filter))))
        //            ->get();
    }

    
}