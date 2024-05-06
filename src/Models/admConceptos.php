<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admConceptos extends BaseModel
{
    protected $table = 'admConceptos';

    protected $primaryKey = 'CIDCONCEPTODOCUMENTO';

    public $timestamps = false;

    /**
     * Returns the las Folio used in the concepto
     *
     * @param integer $concepto
     * @return integer
     */
    public static function ultimoFolio(int $concepto): int
    {
        return static::query()
            ->where('CIDCONCEPTODOCUMENTO', $concepto)
            ->value('CNOFOLIO');
    }

    public static function findById(int $concepto): array
    {
        return static::query()
        ->where('CIDCONCEPTODOCUMENTO', $concepto)
        ->first()
        ->toArray();
    }

    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBRECONCEPTO', 'CIDCONCEPTODOCUMENTO');
    }
}