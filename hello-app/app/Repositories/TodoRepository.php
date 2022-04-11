<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;

class TodoRepository implements RepositoryInterface{


    public function findAll(){
        return Todo::all();
    }
    public function save(Model $model){
        $model->save();
    }
    public function findById(int $id){
        return Todo::where('id',$id)->get()->first();   
    }

    
}