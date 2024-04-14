<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admClasificaciones extends BaseModel
{
    protected $table = 'admClasificaciones';

    protected $primaryKey = 'CIDCLASIFICACION';

    public $timestamps = false;
}