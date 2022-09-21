<?php

namespace App\Models;
use Encore\Admin\Traits\DefaultDateTimeFormat;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use DefaultDateTimeFormat;
    //table name
    protected $table = 'project';

    public function ProductType(){
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }

    public function getRecommended(){
        return $this->where(['is_recommend'=>1])->orderBy('id', 'DESC')->limit(3);
    }

    public function getPopularProducts(){
        return $this->where(['type_id'=>2])->orderBy('id', 'DESC')->limit(3);
    }

    public function getUnRecommended(){
        return $this->where(['is_recommend'=>0])->orderBy('id', 'DESC')->limit(3);
    }

    public function getRecent(){
        return $this->limit(5)->orderBy('id', 'DESC')->get();
    }
}