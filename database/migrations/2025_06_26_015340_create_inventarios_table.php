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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descripcion', 255)->nullable();
            $table->float('cantidad')->default(0);
            $table->enum('tipo', ['general', 'electrico', 'mueble', 'maquinaria', 'herramienta', 'otro'])->default('general');
            $table->string('modelo', 100)->nullable();
            $table->string('marca', 100)->nullable();
            $table->float('valor')->default(0);
            $table->enum('condicion', ['bueno', 'regular','descompuesto'])->default('bueno');
            $table->string('ubicacion', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
