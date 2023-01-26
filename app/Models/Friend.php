<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
public $timestamps = false;
    protected $fillable = [
        'user1_id',
        'user2_id',
        'accepted',
        
    ];
}
