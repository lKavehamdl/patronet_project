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
    protected $fillable = ['brand_id', 'coding_len', "coding_instruction"];

    use HasFactory;
}
