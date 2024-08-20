<?php

namespace App\Interfaces;
use App\Models\Product;

interface ProductInterface{

    public function all();
    public function findById($id);
    public function findByIds(array $ids);
    public function create(array $attributes);
    public function destroy($id);
    public function findProduct($code);
}