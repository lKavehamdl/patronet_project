<?php

namespace  App\Interfaces;

interface CodingInterface{
    public function all();
    public function findById($id);
    public function findByIds(array $ids);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function destroy($id);
    public function createPermuations($arrays);
    public function generatePermutations($arrays);
    public function findBrandID($coding_id);
}