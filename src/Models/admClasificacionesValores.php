<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class admClasificacionesValores extends BaseModel
{
    protected $table = 'admClasificacionesValores';

    protected $primaryKey = 'CIDVALORCLASIFICACION';

    public $timestamps = false;

    /**
     * Definicion de la relacion a la clasificacion padre
     *
     * @return BelongsTo
     */
    public function clasificacion(): BelongsTo
    {
        return $this->belongsTo(
            related: admClasificaciones::class, 
            foreignKey: 'CIDCLASIFICACION'
        );
    }

    /**
     * Devuelde el array para rellenar un select
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CVALORCLASIFICACION', 'CIDVALORCLASIFICACION');
    }
}