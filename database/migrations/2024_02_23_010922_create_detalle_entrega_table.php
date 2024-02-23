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
        Schema::create('detalle_entrega', function (Blueprint $table) {
            $table->integer('iddetalle_entrega')->autoIncrement();
            $table->smallInteger('id_entrega_elementos');
            $table->smallInteger('idelementos');
            $table->float('cantidad', '4')->nullable();
            $table->timestamps();

            $table->foreign('id_entrega_elementos')->references('id_entrega_elementos')->on('entrega_elementos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idelementos')->references('idelementos')->on('elementos')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_entrega');
    }
};
