<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Maestro extends Authenticatable //le cambie el Model por Authenticatable
{
    use Notifiable; // Se agrego este nuevo campo
    protected $table = 'maestros'; //agregue la tabla maeatros
    protected $fillable = ['matricula', 'nombre_completo', 'apellido_paterno', 'apellido_materno','departamento', 'email', 'telefono', 'password', 'rol'];
   
    protected $hidden = ['password', 'remember_token',];

    public function periodos()
{
    return $this->belongsToMany(Periodo::class, 'periodo_maestro')
               ->withTimestamps();
}

    public function asistencias()
{
    return $this->hasMany(Asistencia::class);
}

public function cursos()
{
    return $this->belongsToMany(Curso::class, 'curso_maestro');
}

public function datosLaborales()
{
    return $this->hasOne(DatosLaborales::class);
}

}
