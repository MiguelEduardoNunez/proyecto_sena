<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{ 
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_empleado';
    /**
     * Names of the timestamps.
     */ 
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    /**
     * 
    * Relationships associated with the model.
    */
    public function novedad(): HasMany
    {
        return $this->hasMany(Novedad::class, 'empleado_id','id_empleado');
    }
    
    public function entregaElemento(): HasMany
    {
        return $this->hasMany(EntregaElemento::class,'empleado_id','id_empleado');
    }
}
