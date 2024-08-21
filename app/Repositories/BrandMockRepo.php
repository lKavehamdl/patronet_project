<?php

namespace App\Repositories;
use App\Interfaces\BrandInterface;
use App\Models\Brand;
use App\Repositories\BaseMockRepo;

class BrandMockRepo extends BaseMockRepo implements BrandInterface{
    public function __construct(){
        $this->items = [
            ['id' => '1', 'brand_name' => "test"], ['id' => '2', 'brand_name' => 'KOMAK!']
        ];
        $this->nextId = 3;
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
        return parent::create($attributes);
    }
    public function update($id, array $attributes){
        return parent::update($id, $attributes);
    }
    public function destroy($id){
        return parent::destroy($id);
    }
}
