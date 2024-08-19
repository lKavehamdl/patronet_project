<?php

namespace App\Repositories;
use App\Interfaces\ProductInterface;
class ProductMySQLRepo extends BaseMySQLRepo implements ProductInterface{
    public function __construct($model){
        parent::__construct($model);
    }
    public function paginate($tableName, $perPage, $currpage){
        return parent::paginate($tableName, $perPage, $currpage);
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
    public function destroy($id){
        $products = $this->model->with([])->where('brand_id', $id)->get();
        foreach($products as $product){
            $product->delete();
        }
    }
    public function findProduct($code){
        $data = $this->model->with([])->where('code', 'LIKE' ,"%".$code."%")->get();
        return $data;
    }
}