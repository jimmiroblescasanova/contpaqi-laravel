<?php

namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class admClasificaciones extends BaseModel
{
    protected $table = 'admClasificaciones';

    protected $primaryKey = 'CIDCLASIFICACION';

    public $timestamps = false;

    /**
     * Definición de la relación de los valores
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
     * Función para realizar la búsqueda de clasificaciones por nombre,
     * ya que en el sistema no se les asigna un código
     */
    public function scopeSearchByName(Builder $query, string $nombreClasificacion): void
    {
        $query->where('CNOMBRECLASIFICACION', 'LIKE', '%'.$nombreClasificacion.'%');
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
     */
    public function scopeProductos(Builder $query): void
    {
        $query->whereBetween('CIDCLASIFICACION', [25, 30]);
    }

    /**
     * Devuelve un array para rellenar un select
     */
    public function scopeSelectOptions(Builder $query): Collection
    {
        return $query->pluck('CNOMBRECLASIFICACION', 'CIDCLASIFICACION');
    }
}
