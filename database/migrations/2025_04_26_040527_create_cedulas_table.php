<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCedulasTable extends Migration
{
    public function up()
    {
        Schema::create('cedulas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('telefono');
            $table->string('email');
            $table->json('estudios')->nullable();
            $table->string('carrera_nombre')->nullable();
            $table->string('tipo_puesto');
            $table->string('unidad_responsable');
            $table->string('area');
            $table->string('puesto_actual')->nullable();
            $table->string('nombre_jefe');
            $table->string('domicilio_oficial');
            $table->string('telefono_oficial');
            $table->string('extension')->nullable();
            $table->string('horario');
            $table->string('nombre_evento');
            $table->string('nombre_instructor');
            $table->date('fecha_realizacion');
            $table->string('horario_evento');
            $table->string('sede');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cedulas');
    }
}