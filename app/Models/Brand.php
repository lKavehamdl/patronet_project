<?php

namespace App\Models;

use App\Paginate\MyPaginator;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements MyPaginator
{
    protected $brand_name;
    protected $id;
    protected $fillable = ['brand_name'];

    public function KOMAK($tableName, $perPage, $cuurPage){
        $offset = ($cuurPage-1) * $perPage;
        $items = [];
        $items[] = DB::table($tableName)->offset($offset)->limit($perPage)->get();
        $items[] = $cuurPage;
        return $items;
    }
    use HasFactory;
}
