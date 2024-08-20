<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $brand_name;
    protected $id;
    protected $fillable = ['brand_name'];

    use HasFactory;
}
