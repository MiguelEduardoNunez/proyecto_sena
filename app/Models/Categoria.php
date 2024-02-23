<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    /**
    * Get the comments for the blog post.
    */
    public function subcategoria(): HasMany{
        return $this->hasMany(SubCategoria::class);
    }

}
