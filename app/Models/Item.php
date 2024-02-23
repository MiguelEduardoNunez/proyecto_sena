<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Termwind\Components\Element;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id_item';

    /**
    * Get the post that owns the comment.
    */
    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(subcategoria::class);
    }

    /**
    * Get the phone associated with the user.
    */
    public function elemento(): HasOne
    {
        return $this->hasOne(Elemento::class);
    }


 
}
