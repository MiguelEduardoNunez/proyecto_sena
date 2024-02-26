<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategoria extends Model
{
    protected $table = 'subcategorias';
    protected $primaryKey = 'id_subcategoria';

    /**
    * Get the comments for the blog post.
    */
    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    
    /**
    * Get the comments for the blog post.
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

}
