<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('variaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficio_id');
            $table->string('titulo');
            $table->unsignedDecimal('costo_moneda_local');
            $table->unsignedDecimal('precio_moneda_local');
            $table->unsignedDecimal('precio_creditos');
            $table->timestamps();

            $table->foreign('beneficio_id')->references('id')->on('beneficios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacions');
    }
};
