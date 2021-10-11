<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replyreviews extends Model
{
    protected $fillable = [
        'user_id', 'reply_reviews_message', 'reviews_id',
    ];

    public function reply_tocustomer(){
        return $this->hasOne('App\reviews', 'id', 'reviews_id');
    }

    public function replyreviews_to_user()
    {
        return $this->belongsTo('App\User' ,'user_id');
    }
}
