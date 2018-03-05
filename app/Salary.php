<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function month()
    {
        return $this->belongsTo('App\Month');
    }
}
