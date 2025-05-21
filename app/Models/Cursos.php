<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    // relaciona con las tablas

public function cedula()
{
    return $this->belongsTo(Cedula::class);
}

public function periodo()
{
    return $this->belongsTo(Periodo::class);
}

public function maestros()
{
    return $this->belongsToMany(Maestro::class, 'curso_maestro');
}

public function create()
{
    $cursos = Curso::all(); // o con filtros si aplica
    return view('record', compact('cursos'));
}

}
