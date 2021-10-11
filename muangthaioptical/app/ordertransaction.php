<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordertransaction extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price',
    ];

    // เชื่อม Table orderlist แบบ Many to One
    public function view_order()
    {
        return $this->belongsTo('App\orderlist' ,'order_id');
    }

    // เชื่อม Table productitem แบบ Many to One
    public function data_product(){
        return $this->belongsTo('App\productitem','product_id');
    }
}
