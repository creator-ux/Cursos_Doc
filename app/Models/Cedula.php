<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'rfc',
        'telefono',
        'email',
        'estudios',
        'carrera_nombre',
        'tipo_puesto',
        'unidad_responsable',
        'area',
        'puesto_actual',
        'nombre_jefe',
        'domicilio_oficial',
        'telefono_oficial',
        'extension',
        'horario',
        'nombre_evento',
        'nombre_instructor',
        'fecha_realizacion',
        'horario_evento',
        'sede',
    ];

    protected $casts = [
        'estudios' => 'array',
    ];
}