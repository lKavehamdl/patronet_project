<?php

namespace  App\Interfaces;

interface BrandInterface extends MyPaginatorInterface{
    public function all();
    public function findById($id);
    public function findByIds(array $ids);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function destroy($id);
    public function paginate($perPage, $currPage);
}
