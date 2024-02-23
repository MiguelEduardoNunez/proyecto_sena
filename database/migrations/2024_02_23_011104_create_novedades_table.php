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
        Schema::create('novedades', function (Blueprint $table) {
            $table->integer('idnovedades')->autoIncrement();
            $table->tinyInteger('idTipos_novedades');
            $table->unsignedInteger('idelementos');
            $table->unsignedInteger('idempleado');
            $table->string('descripcion_novedad', '120');
            $table->dateTime('fecha_reporte');
            $table->dateTime('fecha_cierre')->nullable();
            $table->timestamps();

            $table->foreign('idTipos_novedades')->references('idTipos_novedades')->on('Tipos_novedades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idelementos')->references('idelementos')->on('elementos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idempleado')->references('idempleado')->on('empleados')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
