<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admAlmacenes extends BaseModel
{
    protected $table = 'admAlmacenes';

    protected $primaryKey = 'CIDALMACEN';

    public $timestamps = false;

    protected static function booted(): void
    {
        static::addGlobalScope('withoutZero', function (Builder $builder) {
            $builder->where('CIDALMACEN', '>', 0);
        });
    }

    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBREALMACEN', 'CIDALMACEN');
    }
}