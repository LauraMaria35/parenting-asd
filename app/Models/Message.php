<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user1_id',
        'user2_id',
        'text'
    ];

    public function sender(){
        return $this->belongsTo('App\Models\User', 'user1_id'); //return all sender info
    }

    public function receiver(){
        return $this->belongsTo('App\Models\User', 'user2_id'); //return all receiver info
    }
}
