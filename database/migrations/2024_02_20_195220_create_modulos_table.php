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
        Schema::create('modulos', function (Blueprint $table) {
            $table->smallInteger('id_modulo')->autoIncrement();
            $table->smallInteger('modulo_id')->nullable();
            $table->string('modulo', '50');
            $table->string('ruta', '100');
            $table->string('icono', '50');
            $table->smallInteger('orden')->nullable();
            $table->smallInteger('hijos')->nullable();

            $table->foreign('modulo_id')->references('id_modulo')->on('modulos');

            $table->index('id_modulo');
            $table->index('modulo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
