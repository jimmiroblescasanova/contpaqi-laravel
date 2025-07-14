<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class admAlmacenes extends BaseModel
{
    protected $table = 'admAlmacenes';

    protected $primaryKey = 'CIDALMACEN';

    public $timestamps = false;

    /**
     * Global scope para excluir el almacén 0 de los query
     */
    protected static function booted(): void
    {
        static::addGlobalScope('withoutZero', function (Builder $builder) {
            $builder->where('CIDALMACEN', '>', 0);
        });
    }

    /**
     * Aplica el método pluck de laravel para devolver el ID y nombre del almacén
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBREALMACEN', 'CIDALMACEN');
    }
}
