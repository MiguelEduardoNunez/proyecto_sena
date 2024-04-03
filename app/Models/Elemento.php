<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Elemento extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'elementos';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_elemento';


    /**
     * Names of the timestamps.
     */
    const CREATED_AT='creado_en';
    const UPDATED_AT='actualizado_en';


    /**
     * Relationships associated with the model.
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id', 'id_proyecto');
    }

    public function stand(): BelongsTo
    {
        return $this->belongsTo(Stand::class, 'stand_id', 'id_stand');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id_item');
    }

    public function novedad(): HasMany
    {
        return $this->hasMany(Novedad::class, 'elemento_id', 'id_elemento');
    }
}
