<?php
namespace jimmirobles\ContpaqiLaravel\Models;

use Illuminate\Database\Eloquent\Builder;
use jimmirobles\ContpaqiLaravel\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class admDocumentos extends BaseModel
{
    protected $table = 'admDocumentos';

    protected $primaryKey = 'CIDDOCUMENTO';

    public $timestamps = false;

    /**
     * Relacion a la tabla domicilios
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
            localKey: 'CIDDOCUMENTO'
        );
    }

    /**
     * Relacion del documento al concepto
     *
     * @return BelongsTo
     */
    public function concepto(): BelongsTo
    {
        return $this->belongsTo(
            related: admConceptos::class, 
            foreignKey: 'CIDCONCEPTODOCUMENTO', 
            ownerKey: 'CIDCONCEPTODOCUMENTO'
        );
    }

    /**
     * Relacion del documento a sus movimientos
     *
     * @return BelongsTo
     */
    public function movimientos(): HasMany
    {
        return $this->hasMany(
            related: admMovimientos::class, 
            foreignKey: 'CIDDOCUMENTO', 
            localKey: 'CIDDOCUMENTO'
        );
    }

    /**
     * Regresa el ultimo id de la tabla
     *
     * @return int
     */
    public static function getLastId(): int
    {
        return static::query()
            ->orderBy('CIDDOCUMENTO', 'DESC')
            ->value('CIDDOCUMENTO');
    }

    /**
     * Realiza el filtrado por el codigo del concepto
     *
     * @param Builder $query
     * @param string $codigoConcepto
     * @return void
     */
    public function scopeCodigoConcepto(Builder $query, string $codigoConcepto): void
    {
        $query->whereHas('concepto', function($q) use ($codigoConcepto){
            $q->where('CCODIGOCONCEPTO', $codigoConcepto);
        });
    }

    /**
     * Realiza la busqueda de documentos por folio y/o serie
     *
     * @param Builder $query
     * @param integer|string $folio
     * @param string|null $serie
     * @return void
     */
    public function scopeBuscarPorFolio(Builder $query, int|string $folio, string $serie = null): void
    {
        $query
            ->where(column: 'CFOLIO', operator: '=', value: $folio)
            ->when($serie, function ($q) use ($serie){
                $q->where(column: 'CSERIEDOCUMENTO', operator: '=', value: $serie);
            });
    }

    /**
     * Filtra los documentos a tipo factura, independiente del concepto
     *
     * @param Builder $query
     * @return void
     */
    public function scopeFacturas(Builder $query): void
    {
        $query->where(column: 'CIDDOCUMENTODE', operator: '=', value: 4);
    }

    
}