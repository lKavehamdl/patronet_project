<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $code;
    protected $brand_id;

    protected $fillable = ['brand_id', 'code'];
    use HasFactory;
}
