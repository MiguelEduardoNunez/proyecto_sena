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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->tinyIncrements('idProyectos');
            $table->string('nombre_proyecto', '150');
            $table->longText('descripcion_proyecto')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('responsable_proyecto', '60');
            $table->string('email_responsable', '35');
            $table->string('telefono_responsable', '20');
            $table->string('direccion_cliente', '80')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
