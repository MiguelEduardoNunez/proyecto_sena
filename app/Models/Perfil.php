<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */

     protected $table = 'perfiles';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */

    protected $primaryKey = 'id_perfil';


    /**
    * Get the post that owns the comment.
    */
    public function usuario(): HasMany
    {
        return $this->hasMany(Usuario::class, 'perfil_id', 'id_perfil');
    }
}
