<?php

namespace App\Repositories;
use App\Interfaces\CodingInterface;
use App\Repositories\ProductMySQLRepo;
use App\Models\Coding;

class CodingMySQLRepo extends BaseMySQLRepo implements CodingInterface{
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
    public function update($id, array $attributes){
        parent::update($id, $attributes);
    }

    public function destroy($id){
        parent::destroy($id);
    }
    public function generatePermutations($arrays){
        if(empty($arrays)){
            return "BIBILI";
        }
        $ans = [[]];
        foreach($arrays as $array){
            $newRes = [];
            foreach($ans as $temp){
                foreach($array as $element){
                    $newRes[] = array_merge($temp, [$element]);
                }
            }
            $ans = $newRes;
        }
        return $ans;
    }
    public function createPermuations($arrays){
        $ans = $this->generatePermutations($arrays);
        return $ans;
    }

    public function findBrandID($coding_id){
        $coding = parent::getById($coding_id);
        $brand_id = $coding['brand_id'];
        return $brand_id;
    }

}
