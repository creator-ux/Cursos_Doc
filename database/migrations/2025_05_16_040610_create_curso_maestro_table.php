<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('curso_maestro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->foreignId('maestro_id')->constrained('maestros')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['curso_id', 'maestro_id']); // Evita duplicados
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('curso_maestro');
    }
};
