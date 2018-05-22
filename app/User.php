<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function salaries()
    {
        return $this->hasMany('App\Salary');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAuthor($postId)
    {
        $post = Post::find($postId);
        if ($this->id == $post->user_id) {
            return true;
        }

        return false;
    }
}
