<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $timestamps = false;
    
    // //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user1_id', 'user2_id', 'accepted'
    ];
}
