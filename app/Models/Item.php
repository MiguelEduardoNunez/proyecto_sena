<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id_item';

    /**
    * Get the post that owns the comment.
    */
    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(Subcategoria::class);
    }

    /**
    * Get the phone associated with the user.
    */
    public function elemento(): HasOne
    {
        return $this->hasOne(Elemento::class);
    }

}
