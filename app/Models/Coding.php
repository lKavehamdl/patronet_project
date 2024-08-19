<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coding extends Model
{

    protected $brand_id;
    protected $coding_len;
    protected $coding_instruction;

    public function KOMAK($tableName, $perPage, $cuurPage){
        $offset = ($cuurPage-1) * $perPage;
        $items = [];
        $items[] = DB::table($tableName)->offset($offset)->limit($perPage)->get();
        $items[] = $cuurPage;
        return $items;
    }
    protected $fillable = ['brand_id', 'coding_len', "coding_instruction"];

    use HasFactory;
}
