<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class admClasificacionesValores extends BaseModel
{
    protected $table = 'admClasificacionesValores';

    protected $primaryKey = 'CIDVALORCLASIFICACION';

    public $timestamps = false;

    /**
     * Definición de la relación a la clasificación padre
     */
    public function clasificacion(): BelongsTo
    {
        return $this->belongsTo(
            related: admClasificaciones::class,
            foreignKey: 'CIDCLASIFICACION'
        );
    }

    /**
     * Devuelve el array para rellenar un select
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CVALORCLASIFICACION', 'CIDVALORCLASIFICACION');
    }
}
