<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandImport implements ToModel{
    public function model(array $row){
        $brand = new Brand();
        // $brand->id = (int)$row[0];
        $brand->brand_name = $row[0];
        return $brand;
    }
}

