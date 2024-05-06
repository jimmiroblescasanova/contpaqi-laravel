<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admMovimientos extends BaseModel
{
    protected $table = 'admMovimientos';

    protected $primaryKey = 'CIDMOVIMIENTO';

    public $timestamps = false;

    /**
     * Regresa el ultimo id de la tabla
     *
     * @return int
     */
    public static function getLastId(): int
    {
        return static::query()
            ->orderBy('CIDMOVIMIENTO', 'DESC')
            ->value('CIDMOVIMIENTO');
    }
}