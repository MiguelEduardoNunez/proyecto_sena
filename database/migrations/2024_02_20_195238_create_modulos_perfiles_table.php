<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modulos_perfiles', function (Blueprint $table) {
            $table->smallInteger('modulo_id');
            $table->smallInteger('perfil_id');
            $table->char('permiso', '5')->nullable();
            $table->timestamp('creado_en');
            $table->timestamp('actualizado_en')->nullable();

            $table->primary(['perfil_id', 'modulo_id']);	

            $table->foreign('modulo_id')->references('id_modulo')->on('modulos');
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles');
            
            $table->index(['perfil_id', 'modulo_id']);
            $table->index('modulo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos_perfiles');
    }
};
