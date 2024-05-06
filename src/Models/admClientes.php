<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class admClientes extends BaseModel
{
    protected $table = 'admClientes';

    protected $primaryKey = 'CIDCLIENTEPROVEEDOR';

    public $timestamps = false;

    /**
     * Define la relacion a la tabla domicilios
     *
     * @return MorphMany
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
     * Realiza la busqueda del cliente por su codigo del sistema
     *
     * @param Builder $query
     * @param string $code
     * @return void
     */
    public function scopeBuscarPorCodigo(Builder $query, string $code): void
    {
        $query->where('CCODIGOCLIENTE', $code);
    }

    /**
     * Hace un filtrado de solamente los clientes y cliente-proveedor
     *
     * @param Builder $query
     * @return void
     */
    public function scopeClientes(Builder $query): void
    {
        $query->where('CTIPOCLIENTE', 1)->orWhere('CTIPOCLIENTE', 2);
    }

    /**
     * Hace un filtrado de solamente los proveedores y clientes-proveedores
     *
     * @param Builder $query
     * @return void
     */
    public function scopeProveedores(Builder $query): void
    {
        $query->where('CTIPOCLIENTE', 3)->orWhere('CTIPOCLIENTE', 2);
    }

    /**
     * Aplica el metodo pluck de laravel para devolver el ID y la Razon social
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CRAZONSOCIAL', 'CIDCLIENTEPROVEEDOR');
    }
}