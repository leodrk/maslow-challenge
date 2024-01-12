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
        Schema::create('canjes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variacion_id');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('gift_card_id');
            $table->unsignedDecimal('costo_moneda_local');
            $table->unsignedDecimal('precio_venta_moneda_local');
            $table->unsignedDecimal('precio_venta_creditos');
            $table->timestamps();

            $table->foreign('variacion_id')->references('id')->on('variaciones');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('gift_card_id')->references('id')->on('gift_cards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canjes');
    }
};
