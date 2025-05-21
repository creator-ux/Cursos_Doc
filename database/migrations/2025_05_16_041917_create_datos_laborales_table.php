<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('datos_laborales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maestro_id')->unique()->constrained('maestros')->onDelete('cascade');
            $table->string('unidad_responsable');
            $table->string('area');
            $table->string('tipo_puesto');
            $table->string('nombre_jefe');
            $table->string('domicilio_oficial');
            $table->string('telefono_oficial');
            $table->string('extension')->nullable();
            $table->string('horario');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('datos_laborales');
    }
};
