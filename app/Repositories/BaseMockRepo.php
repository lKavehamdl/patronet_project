<?php

namespace App\Repositories;

abstract class BaseMockRepo{
    protected $items = [];
    protected $nextId = 1;

    public function __construct(array $items = []){
        $this->items = $items;
    }

    public function paginate($perPage, $currPgae){
        $offset = ($currPgae-1) * $perPage;
        $dst = $currPgae * $perPage;
        $data = [];
        while($offset < $dst){
            $data[] = $this->items[$offset];
            $offset ++;
        } 
        return $data;
    }

    public function get(){
        return $this->items;
    }

    public function getById($id){
        foreach($this->items as $item){
            if($item['id'] == $id){
                return $item;
            }
        }
        return null;
    }

    public function getByIds(array $ids){
        $ans = [];
        foreach($ids as $id){
            foreach($this->items as $item){
                if($item['id'] == $id){
                    $ans[] = $item;
                }
            }
        }
        return $ans;
    }

    public function create(array $attributes){
        $attributes['id'] = $this->nextId++;
        $this->items[] = $attributes;
        return $this->items;
    }

    public function update($id, array $attributes){
        foreach($this->items as &$item){
            if($item['id'] == $id){
                $item = array_merge($item, $attributes);
                $item['id'] = $id;
                return $item;
            }
        }
        return null;
    }

    public function destroy($id){
        foreach($this->items as $key => $item){
            if($item['id'] == $id){
                unset($this->items[$key]);
            }
        }
    }
}
