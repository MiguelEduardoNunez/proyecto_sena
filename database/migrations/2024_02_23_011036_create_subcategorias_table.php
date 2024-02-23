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
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->integer('idsubcategorias')->autoIncrement();
            $table->unsignedInteger('idcategorias');
            $table->string('nombre_subcategoria', '80');
            $table->string('descripcion_subcategoria', '100')->nullable();
            $table->timestamps();

            $table->foreign('idcategorias')->references('idcategorias')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategorias');
    }
};
