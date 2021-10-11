<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productitem extends Model
{
    protected $fillable = [
        'product_name', 'detail', 'itemquantity', 'price', 'product_image',
    ];

    public function product_to_review(){
        return $this->hasMany('App\reviews', 'product_id', 'id');
    }
}
