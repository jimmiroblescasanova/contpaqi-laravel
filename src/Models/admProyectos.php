<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class admProyectos extends BaseModel
{
    protected $table = 'admProyectos';

    protected $primaryKey = 'CIDPROYECTO';

    public $timestamps = false;

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