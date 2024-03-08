<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Novedad extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'id_novedad';

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    /**
    * Get the post that owns the comment.
    */
    public function tipoNovedad(): BelongsTo
    {
        return $this->belongsTo(TipoNovedad::class, 'tipo_novedad_id', 'id_tipo_novedad');
    }

    /**
    * Get the post that owns the comment.
    */
    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class, 'elemento_id', 'id_elemento');
    }

        /**
     * Get the post that owns the comment.
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id_empleado');
    }
}
