<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admAlmacenes extends BaseModel
{
    protected $table = 'admAlmacenes';

    protected $primaryKey = 'CIDALMACEN';

    public $timestamps = false;
}