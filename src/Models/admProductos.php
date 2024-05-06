<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;

class admProductos extends BaseModel
{
    protected $table = 'admProductos';

    protected $primaryKey = 'CIDPRODUCTO';

    public $timestamps = false;

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(
            admUnidadesMedidaPeso::class, 
            foreignKey: 'CIDUNIDADBASE', 
            ownerKey: 'CIDUNIDAD');
    }

    public function clasificacion_1(): BelongsTo
    {
        return $this->belongsTo(
            admClasificacionesValores::class,
            foreignKey: 'CIDVALORCLASIFICACION1',
            ownerKey: 'CIDVALORCLASIFICACION'
        );
    }
}