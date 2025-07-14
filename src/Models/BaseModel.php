<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getConnection(): \Illuminate\Database\Connection
    {
        return static::resolveConnection('contpaqi');
    }
}
