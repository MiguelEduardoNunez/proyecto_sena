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
        Schema::create('entrega_elementos', function (Blueprint $table) {
            $table->integer('id_entrega_elementos')->autoIncrement();
            $table->tinyInteger('idProyectos');
            $table->unsignedInteger('idempleado');
            $table->date('fecha_entrega');
            $table->timestamps();

            $table->foreign('idProyectos')->references('idProyectos')->on('proyectos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idempleado')->references('idempleado')->on('empleados')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_elementos');
    }
};
