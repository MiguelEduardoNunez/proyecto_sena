<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EntregaElemento extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entregas_elementos';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_entrega_elemento';

    /**
     * Names of the timestamps.
     */
    const CREATED_AT='creado_en';
    const UPDATED_AT='actualizado_en';

    /**
     * 
    * Relationships associated with the model.
    */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id_proyecto');
    }

    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class, 'elemento_id', 'id_elemento');
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class,'empleado_id', 'id_empleado');
    }

    public function detalleEntrega(): HasOne
    {
        return $this->hasOne(DetalleEntrega::class, 'entrega_elemento_id', 'id_entrega_elemento');
    }
}
