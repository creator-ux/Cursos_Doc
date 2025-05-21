<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso');
            $table->enum('tipo', ['profesional', 'docente']);
            $table->text('descripcion')->nullable();
            $table->integer('duracion')->nullable(); // Horas, días, etc.
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();

            // Relaciones
            $table->foreignId('maestro_id')->nullable()->constrained('maestros')->onDelete('set null');
            $table->foreignId('cedula_id')->nullable()->constrained('cedulas')->onDelete('set null');
            $table->foreignId('periodo_id')->nullable()->constrained('periodos')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
