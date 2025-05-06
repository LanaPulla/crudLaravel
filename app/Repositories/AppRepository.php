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

    public function find($perPage = 3){
    //    return App::all();

    return $this->model->paginate($perPage);   
 }

    public function findById($id){

        $search = $this->model->newQuery();

        return $search->where('id', '=', $id)->first();

 
         // return $this->model->all();
     }

    public function delete($id){
      
        $this->model->findOrFail($id)->delete();

    }

    public function filter($filter, $paginate = true, $perPage = 3)
    {
      // dd($filter->has('age'));
        $search = $this->model->newQuery();

        if(isset($filter['name']))
        {
            $name = mb_strtoupper(str_replace(' ', '%', trim($filter['name'])));
            $search->where(DB::raw("UPPER(name)"), 'LIKE', '%' . $name . '%');        }

        if(isset($filter['age'])){
            $age = (int) $filter['age']; // Converte explicitamente para inteiro
            $data_inicio = now()->subYears($age + 1)->addDay()->toDateString();
            $data_fim = now()->subYears($age)->toDateString();
            $search->whereBetween('birthdate', [$data_inicio, $data_fim]);
        }
        return $paginate ? $search->paginate($perPage) : $search->get();
    
        // return $search
        //             ->where(DB::raw("UPPER(name)"), 'LIKE', '%' . mb_strtoupper(trim($filter)) . '%')
        //            ->get();

        // return $search
        //             ->where(DB::raw("UPPER(name)"), '=', mb_strtoupper(str_replace(' ', '%', trim($filter))))
        //            ->get();
    }

    
}