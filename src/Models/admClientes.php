<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

class admClientes extends BaseModel
{
    protected $table = 'admClientes';

    protected $primaryKey = 'CIDCLIENTEPROVEEDOR';

    public $timestamps = false;

    /**
     * Define la relación a la tabla domicilios
     */
    public function domicilios(): MorphMany
    {
        return $this->morphMany(
            related: admDomicilios::class,
            name: 'addressable',
            type: 'CTIPOCATALOGO',
            id: 'CIDCATALOGO',
            localKey: 'CIDCLIENTEPROVEEDOR'
        );
    }

    /**
     * Return only active clients or suppliers
     */
    public function scopeActive(Builder $query): void
    {
        $query->where(column: 'CESTATUS', operator: '=', value: 1);
    }

    /**
     * Realiza la búsqueda del cliente por su código del sistema
     */
    public function scopeBuscarPorCodigo(Builder $query, string $code): void
    {
        $query->where('CCODIGOCLIENTE', $code);
    }

    /**
     * Hace un filtrado de solamente los clientes y cliente-proveedor
     */
    public function scopeClientes(Builder $query): void
    {
        $query->where('CTIPOCLIENTE', 1)->orWhere('CTIPOCLIENTE', 2);
    }

    /**
     * Hace un filtrado de solamente los proveedores y clientes-proveedores
     */
    public function scopeProveedores(Builder $query): void
    {
        $query->where('CTIPOCLIENTE', 3)->orWhere('CTIPOCLIENTE', 2);
    }

    /**
     * Aplica el método pluck de laravel para devolver el ID y la razón social
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CRAZONSOCIAL', 'CIDCLIENTEPROVEEDOR');
    }
}
