<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';


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
