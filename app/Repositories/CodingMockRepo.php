<?php

namespace App\Repositories;
use App\Interfaces\CodingInterface;

class CodingMockRepo extends BaseMockRepo implements CodingInterface{

    public function __construct(){
        $this->items = [['id' => '1', 'brand_id' => "1", 'coding_len' => '3', 'coding_instruction' => 'size-color-material'],
        ['id' => '2', 'brand_id' => '2', 'coding_len' => '2', 'coding_instruction' => "type-color"]];
        $this->nextId = 3;
    }

    public function paginate($perPage, $currpage){
        return parent::paginate($perPage, $currpage);
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
