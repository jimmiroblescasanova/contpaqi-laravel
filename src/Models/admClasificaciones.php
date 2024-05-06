<?php 

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class admClasificaciones extends BaseModel
{
    protected $table = 'admClasificaciones';

    protected $primaryKey = 'CIDCLASIFICACION';

    public $timestamps = false;

    /**
     * Definicion de la relacion de los valores
     *
     * @return HasMany
     */
    public function valores(): HasMany
    {
        return $this->hasMany(
            related: admClasificacionesValores::class, 
            foreignKey: 'CIDCLASIFICACION', 
            localKey: 'CIDCLASIFICACION'
        );
    }

    /**
     * Funcion para realizar la busqueda de clasificaciones por nombre
     * ya que en el sistema no se les asigna un codigo
     * 
     * @param Builder $query
     * @param string $nombreClasificacion
     * @return void
     */
    public function scopeSearchByName(Builder $query, string $nombreClasificacion): void
    {
        $query->where('CNOMBRECLASIFICACION', 'LIKE', '%' . $nombreClasificacion . '%');
    }

    // TODO: Documentar las demas funciones
    public function scopeAgentes(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [1, 6]);
    }

    public function scopeClientes(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [7, 12]);
    }

    public function scopeProveedores(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [13, 18]);
    }

    public function scopeAlmacenes(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [19, 24]);
    }

    /**
     * Realiza un filtrado de las clasificaciones de productos
     *
     * @param Builder $query
     * @return void
     */
    public function scopeProductos(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [25, 30]);
    }

    /**
     * Devuelde un array para rellenar un select
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBRECLASIFICACION', 'CIDCLASIFICACION');
    }
}