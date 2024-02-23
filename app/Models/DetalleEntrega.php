<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleEntrega extends Model
{
    protected $table = 'detalles_entregas';
    protected $primaryKey = 'id_detalle_entrega';

    /**
    * Get the post that owns the comment.
    */
    public function entregaElemento(): BelongsTo
    {
        return $this->belongsTo(EntregaElemento::class);
    }

    /**
    * Get the post that owns the comment.
    */
    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class);
    }
}
