<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'message_Reviews', 'ansbyadmin',
    ];

    public function reviews_to_user()
    {
        return $this->belongsTo('App\User' ,'user_id');
    }

    public function reviews_to_product()
    {
        return $this->belongsTo('App\productitem' ,'product_id');
    }

    public function reply_byadmin(){
        return $this->hasOne('App\replyreviews', 'reviews_id', 'id');
    }
}
