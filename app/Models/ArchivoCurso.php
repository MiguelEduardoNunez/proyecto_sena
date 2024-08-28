<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArchivoCurso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'archivos_cursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_archivo_curso';

    /**
     * Names of the timestamps.
     */
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'curso_realizado_id',
        'certificado_curso_pdf	',
        'creado_por',
        'actualizado_por',];

    /**
     * Relationship with the model.
     */
    public function cursoRealizado():BelongsTo
    {
        return $this->belongsTo(CursoRealizado::class, 'curso_realizado_id');
    }



    use HasFactory;
}
