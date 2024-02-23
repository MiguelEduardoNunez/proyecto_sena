<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Novedad extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'id_novedad';

    /**
    * Get the post that owns the comment.
    */
    public function tipoNovedad(): BelongsTo
    {
        return $this->belongsTo(TipoNovedad::class);
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
}
