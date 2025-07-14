<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class admConceptos extends BaseModel
{
    protected $table = 'admConceptos';

    protected $primaryKey = 'CIDCONCEPTODOCUMENTO';

    public $timestamps = false;

    /**
     * Returns the las Folio used in the concepto
     */
    public static function ultimoFolio(int $concepto): int
    {
        return static::query()
            ->where('CIDCONCEPTODOCUMENTO', $concepto)
            ->value('CNOFOLIO');
    }

    /**
     * Devuelve un array con la información del concepto
     */
    public static function findById(int $concepto): array
    {
        return static::query()
            ->where('CIDCONCEPTODOCUMENTO', $concepto)
            ->first()
            ->toArray();
    }

    /**
     * Scope to generate a collection of options for select inputs
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBRECONCEPTO', 'CIDCONCEPTODOCUMENTO');
    }
}
