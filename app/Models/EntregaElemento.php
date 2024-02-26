<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EntregaElemento extends Model
{
    protected $table = 'entregas_elementos';
    protected $primaryKey = 'id_entrega_elemento';

    /**
    * Get the post that owns the comment.
    */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function detalleEntrega(): HasOne
    {
        return $this->hasOne(DetalleEntrega::class);
    }
}
