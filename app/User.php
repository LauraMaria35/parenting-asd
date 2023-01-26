<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    //will return all messages sent by a user 
    //How to call it?  Auth::user()->sentMessages;
    public function sentMessages(){
        return $this->hasMany('App\Message','user1_id');
    }

    //will return all messages a user received
    //How to call it? Auth::user()->receivedMessages
    public function receivedMessages(){
        return $this->hasMany('App\Message','user2_id');
    }

    public function sendPasswordResetNotification($token)
{
    $url = 'https://example.com/reset-password?token='.$token;
 
    $this->notify(new ResetPasswordNotification($url));
}
}
