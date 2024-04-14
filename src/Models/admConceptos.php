<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admConceptos extends BaseModel
{
    protected $table = 'admConceptos';

    protected $primaryKey = 'CIDCONCEPTODOCUMENTO';

    public $timestamps = false;
}