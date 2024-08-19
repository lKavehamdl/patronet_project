<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $code;
    protected $brand_id;

    public function KOMAK($tableName, $perPage, $cuurPage){
        $offset = ($cuurPage-1) * $perPage;
        $items = [];
        $items[] = DB::table($tableName)->offset($offset)->limit($perPage)->get();
        $items[] = $cuurPage;
        return $items;
    }
    protected $fillable = ['brand_id', 'code'];
    use HasFactory;
}
