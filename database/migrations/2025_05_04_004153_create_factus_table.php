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
        Schema::create('factus', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('Concepto')->nullable();
            $table->string('Proveedor')->nullable() ;
            $table->string('No_Factura')->unique()->nullable();
            $table->float('Monto')->nullable();
            $table->string('Tipo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factus');
    }
};
