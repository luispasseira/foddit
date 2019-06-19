<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
