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
        Schema::create('elementos', function (Blueprint $table) {
            $table->integer('idelementos')->autoIncrement();
            $table->tinyInteger('idProyectos')->unsigned();
            $table->tinyInteger('idstands')->unsigned();
            $table->tinyInteger('iditems')->unsigned();
            $table->string('marca', '45')->nullable();
            $table->string('modelo', '45')->nullable();
            $table->string('serial', '45')->nullable();
            $table->string('span', '45')->nullable();
            $table->string('codigo_barras', '100')->nullable();
            $table->string('grosor', '45')->nullable();
            $table->string('peso', '30')->nullable();
            $table->float('cantidad', '3')->nullable();
            $table->float('cantidad_minima', '3')->nullable();
            $table->timestamps();

            $table->foreign('idProyectos')->references('idProyectos')->on('proyectos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idstands')->references('idstands')->on('stands')->onDelete('no action')->onUpdate('no action');
            $table->foreign('iditems')->references('iditems')->on('items')->onDelete('no action')->onUpdate('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
