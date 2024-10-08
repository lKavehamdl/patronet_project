<?php

namespace App\Repositories;

use App\Paginate\MyPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class BaseMySQLRepo{

    protected $model;
    public function paginate($perPage, $currPage){
        return $this->model::with([])->paginate($perPage, ['*'], 'page', $currPage);
    }
    public function __construct($model){
        $this->model = $model;
    }
    public function get(){
        $response = $this->model->all();
        return response()->json($response);
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function getByIds(array $ids){
        return $this->model->whereIn('id', $ids)->get();
    }

    public function create(array $attributes){
        $data = $this->model->create($attributes);
        $data->save();
    }

    public function update($id, array $attributes){
        $newData = $this->model->find($id);
        $newData->update($attributes);
        return $newData; 
    }

    public function destroy($id){
        $this->model->with([])->find($id)[0]->delete();
    }

}