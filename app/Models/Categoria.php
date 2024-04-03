<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    const CREATED_AT='creado_en';
    const UPDATED_AT='actualizado_en';

    /**
    * Get the comments for the blog post.
    */
    public function subcategoria(): HasMany
    {
        return $this->hasMany(Subcategoria::class, 'categoria_id', 'id_categoria');
    }

}
