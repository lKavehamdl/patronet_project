<?php

namespace App\Imports;

use App\Models\Coding;
use Maatwebsite\Excel\Concerns\ToModel;

class CodingImport implements ToModel{
    public function model(array $row){
        $coding = new Coding;
        $coding->brand_id = $row[0];
        $coding->coding_len = $row[1];
        $coding->coding_instruction = $row[2];
        return $coding;
    }
}

