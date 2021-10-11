<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'tel', 'email', 'address', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // เชื่อม Table basket แบบ One to One
    public function user_basket(){
        return $this->hasOne('App\basket', 'user_id', 'id');
    }

    public function user_address(){
        return $this->hasMany('App\Useradd', 'user_id', 'id');
    }

    public function user_to_review(){
        return $this->hasMany('App\reviews', 'user_id', 'id');
    }

    public function user_to_replyreviews(){
        return $this->hasMany('App\replyreviews', 'user_id', 'id');
    }
}
