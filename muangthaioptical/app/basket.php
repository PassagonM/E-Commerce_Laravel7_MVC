<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class basket extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'number',
    ];

    // เชื่อม Table user แบบ One to One
    public function user_basket(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    // เชื่อม Table productitem แบบ One to Many
    public function user_productitem(){
        return $this->hasMany('App\productitem', 'id', 'product_id');
    }
}
