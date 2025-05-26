@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📚 Lista de Cursos y Tareas Subidas</h4>
        </div>

        <div class="card-body p-0">
            @if($cursos->isEmpty())
                <div class="alert alert-info m-3">
                    No hay cursos registrados aún.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Curso</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Duración</th>
                                <th>Fecha inicio</th>
                                <th>Fecha final</th>
                                <th>Tarea</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->nombre_curso }}</td>
                                    <td>{{ ucfirst($curso->tipo) }}</td>
                                    <td>{{ $curso->descripcion }}</td>
                                    <td>{{ $curso->duracion }} hrs</td>
                                    <td>{{ \Carbon\Carbon::parse($curso->fecha_inicio)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($curso->fecha_fin)->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($curso->documento)
                                            <a href="{{ asset('storage/' . $curso->documento) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                                Descargar PDF
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">Sin tarea</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
