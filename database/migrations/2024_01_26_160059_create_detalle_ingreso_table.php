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
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->integer('id_detalle_ingreso');
            $table->integer('id_ingreso');
            $table->integer('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_compra',11,2);
            $table->decimal('precio_venta',11,2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingreso');
    }
};
