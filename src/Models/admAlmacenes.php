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

    /**
     * Global scope para excluir el almacen 0 de los query
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope('withoutZero', function (Builder $builder) {
            $builder->where('CIDALMACEN', '>', 0);
        });
    }

    /**
     * Aplica el metodo pluck de laravel para devolver el ID y nombre del almacen
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBREALMACEN', 'CIDALMACEN');
    }
}