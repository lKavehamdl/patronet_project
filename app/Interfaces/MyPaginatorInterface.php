<?php

namespace App\Interfaces;

interface MyPaginatorInterface{
    public function paginate($perPage, $currPage);
}