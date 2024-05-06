<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admUnidadesMedidaPeso extends BaseModel
{
    protected $table = 'admUnidadesMedidaPeso';

    protected $primaryKey = 'CIDUNIDAD';

    public $timestamps = false;
}