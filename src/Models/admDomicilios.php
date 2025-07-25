<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class admDomicilios extends BaseModel
{
    protected $table = 'admDomicilios';

    protected $primaryKey = 'CIDDIRECCION';

    public $timestamps = false;

    /**
     * Define la relacion polimorfica
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Obtiene la direccion fiscal de la tabla asociada
     */
    public function scopeFiscal(Builder $query): void
    {
        $query->where(column: 'CTIPODIRECCION', operator: '=', value: 0);
    }

    /**
     * Obtiene la(s) direccion(es) de envio de la tabla asociada
     */
    public function scopeEnvio(Builder $query): void
    {
        $query->where(column: 'CTIPODIRECCION', operator: '=', value: 1);
    }
}
