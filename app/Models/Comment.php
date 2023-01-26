<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'text'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    } 
}
