<?php

namespace  App\Interfaces;

interface BrandInterface{
    public function all();
    public function findById($id);
    public function findByIds(array $ids);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function destroy($id);

}
