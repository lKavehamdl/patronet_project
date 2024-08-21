<?php

namespace App\Repositories;
use App\Interfaces\BrandInterface;
use App\Models\Brand;

class BrandMySQLRepo extends BaseMySQLRepo implements BrandInterface{

    public function __construct($model){
        parent::__construct($model);
    }
    public function paginate($perPage, $currPage){
        return parent::paginate($perPage, $currPage);
    }
    public function all(){
        return parent::get();
    }
    public function findById($id){
        return parent::getById($id);
    }
    public function findByIds(array $ids){
        return parent::getByIds($ids);
    }
    public function create(array $attributes){
        parent::create($attributes);
    }
    public function update($id, $attributes){
        parent::update($id, $attributes);
    }
    public function destroy($id){
        parent::destroy($id);
    }
}