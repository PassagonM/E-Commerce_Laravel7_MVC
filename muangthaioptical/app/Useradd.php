<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useradd extends Model
{
    protected $fillable = [
        'user_id', 'lastname', 'textaddress', 'active',
    ];

    public function address_to_user()
    {
        return $this->belongsTo('App\User' ,'user_id');
    }

    public function address_to_order(){
        return $this->hasMany('App\orderlist', 'sendtoaddress', 'id');
    }
}
