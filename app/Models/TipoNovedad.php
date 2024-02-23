<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoNovedad extends Model
{
    protected $table = 'tipos_novedades';
    protected $primaryKey = 'id_tipo_novedad';

    /**
    * Get the comments for the blog post.
    */
    public function novedad(): HasMany{
        return $this->hasMany(Novedad::class);
    }

}
