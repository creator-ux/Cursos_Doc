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

        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('nombre_completo');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('departamento');
            $table->string('email')->unique(); //modifique correo por email
            $table->string('password');
            $table->tinyInteger('rol')->default(1); // 0=admin, 1=user
            $table->string('telefono')->nullable();
            $table->string('rfc');
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
