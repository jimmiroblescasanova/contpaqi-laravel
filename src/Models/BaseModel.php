<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getConnection()
    {
        return static::resolveConnection('contpaqi');
    }
}