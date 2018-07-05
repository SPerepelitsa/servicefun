<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function isAuthor($userId)
    {
        return $this->user_id === $userId;
    }
}
