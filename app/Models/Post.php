<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'image',
        'user_id',
        
    ];

// public function user(){

//     return $this->belongsTo('App\Models\User');
// }

public function user()
{
    return $this->belongsTo(User::class);
}

public function comments(){
    return $this->hasMany('App\Models\Comment');
}


}
