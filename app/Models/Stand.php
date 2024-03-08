<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stand extends Model
{
    protected $table = 'stands';
    protected $primaryKey = 'id_stand';
    const CREATED_AT='creado_en';
    const UPDATED_AT='actualizado_en';

    /**
    * Get the comments for the blog post.
    */
    public function elemento(): HasMany
    {
        return $this->hasMany(Elemento::class);
    }

}
