<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderlist extends Model
{
    protected $fillable = [
        'user_id', 'orderstatus', 'message_byCustomer', 'sendtoaddress', 'basket_id',
    ];

    // เชื่อม table transaction แบบ One to Many
    public function view_transaction(){
        return $this->hasMany('App\ordertransaction', 'order_id', 'id');
    }

    // เชื่อม table User แบบ One to One
    public function data_user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function order_to_address()
    {
        return $this->belongsTo('App\Useradd' ,'sendtoaddress');
    }

}
