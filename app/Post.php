<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'title',
        'body',
        'rate',
        'theme_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function theme(){
        return $this->belongsTo(Theme::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function userRatedPosts(){
        return $this->hasMany(UserRatedPost::class);
    }

    public static function userHasVoted($post, $user)
    {
        $voted = UserRatedPost::where("post_id", "=", $post)->whereAnd("user_id", "=", $user)->first();
        if ($voted) {
            if ($voted->voted == true) {
                return 1;
            } else return 0;
        }
        else return 0;
    }
}
