<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $primaryKey = 'id_empleado';
        
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    /**
    * Get the comments for the blog post.
    */
    public function novedad(): HasMany
    {
        return $this->hasMany(Novedad::class);
    }

    /**
    * Get the comments for the blog post.
    */
    public function entregaElemento(): HasMany
    {
        return $this->hasMany(EntregaElemento::class);
    }
}
