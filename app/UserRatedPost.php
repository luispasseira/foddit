<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRatedPost extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'voted'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
