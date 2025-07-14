<?php

namespace jimmirobles\ContpaqiLaravel\Models;

class admMovimientos extends BaseModel
{
    protected $table = 'admMovimientos';

    protected $primaryKey = 'CIDMOVIMIENTO';

    public $timestamps = false;

    /**
     * Regresa el ultimo id de la tabla
     */
    public static function getLastId(): int
    {
        return static::query()
            ->orderBy('CIDMOVIMIENTO', 'DESC')
            ->value('CIDMOVIMIENTO');
    }
}
