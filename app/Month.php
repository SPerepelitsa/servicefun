<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    public function salary()
    {
        return $this->hasOne('App\Salary');
    }
}
