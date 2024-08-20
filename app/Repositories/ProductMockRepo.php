<?php

namespace App\Repositories;
use App\Interfaces\ProductInterface;

class ProductMockRepo extends BaseMockRepo implements ProductInterface{

    public function __construct(){
        $this->items = [['id' => '1', 'brand_id' => "1", 'code' => '1Xa'],
        ['id' => '2', 'brand_id' => "1", 'code' => '1Xb'],
        ['id' => '3', 'brand_id' => "1", 'code' => '1Ya'],
        ['id' => '4', 'brand_id' => "1", 'code' => '1Yb'],
        ['id' => '5', 'brand_id' => "1", 'code' => '2Xa'],
        ['id' => '6', 'brand_id' => "1", 'code' => '2Xb'],
        ['id' => '7', 'brand_id' => "1", 'code' => '2Ya'],
        ['id' => '8', 'brand_id' => "1", 'code' => '2Yb']];

        $this->nextId = 9;
    
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

    public function findProduct($code){
        foreach($this->items as $item){
            if($item['code'] == $code){
                return $item;
            }
        }
        return null;
    }
}