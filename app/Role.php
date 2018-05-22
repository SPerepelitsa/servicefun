<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function getRole($name)
    {
        $role = self::where('name', $name)->first();
        if (is_null($role)) {
            return false;
        }

        return $role;
    }
}
