<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Clientes extends BaseModel
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
}