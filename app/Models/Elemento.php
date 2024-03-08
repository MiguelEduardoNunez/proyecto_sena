<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Elemento extends Model
{



    protected $table = 'elementos';
    protected $primaryKey = 'id_elemento';

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    /**
    * Get the post that owns the comment.
    */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id_proyecto');
    }

    /**
    * Get the post that owns the comment.
    */
    public function stand(): BelongsTo
    {
        return $this->belongsTo(Stand::class, 'stand_id', 'id_stand');
    }

    /**
     * Get the user that owns the phone.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id_item');
    }

    /**
     * Get the comments for the blog post.
     */
    public function novedad(): HasMany
    {
        return $this->hasMany(Novedad::class, 'elemento_id', 'id_elemento');
    }

    /**
     * Get the comments for the blog post.
     */
    public function entregaElemento(): BelongsToMany
    {
        return $this->belongsToMany(EntregaElemento::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function detalleEntrega(): HasOne
    {
        return $this->hasOne(DetalleEntrega::class);
    }
}
