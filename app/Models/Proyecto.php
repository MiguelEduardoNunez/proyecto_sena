<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';


    /**
    * Get the comments for the blog post.
    */
    public function elemento(): HasMany
    {
        return $this->hasMany(Elemento::class);
    }

    /**
    * Get the comments for the blog post.
    */
    public function entregaElemento(): HasMany
    {
        return $this->hasMany(EntregaElemento::class);
    }   

    
}
