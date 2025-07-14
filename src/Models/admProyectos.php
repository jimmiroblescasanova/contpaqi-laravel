<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class admProyectos extends BaseModel
{
    protected $table = 'admProyectos';

    protected $primaryKey = 'CIDPROYECTO';

    public $timestamps = false;

    /**
     * Global scope para no incluir el proyecto 0 en los query
     */
    protected static function booted(): void
    {
        static::addGlobalScope('withoutZero', function (Builder $builder) {
            $builder->where('CIDPROYECTO', '>', 0);
        });
    }

    public static function findById(int $proyecto): array
    {
        return static::query()
            ->where('CIDPROYECTO', $proyecto)
            ->first()
            ->toArray();
    }

    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBREPROYECTO', 'CIDPROYECTO');
    }
}
