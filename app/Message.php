<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

     //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user1_id', 'user2_id', 'text'
    ];


    public function sender(){
        return $this->belongsTo('App\User','user1_id'); //return all sender info 
    
    }

    public function receiver(){
        return $this->belongsTo('App\User', 'user2_id'); //return all receiver info 
    }


}
