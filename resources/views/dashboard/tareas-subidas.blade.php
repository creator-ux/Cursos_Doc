@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="fas fa-file-alt me-2"></i>
            <h4 class="mb-0">Tareas Subidas</h4>
        </div>
        <div class="card-body">
            @if($cursos->isEmpty())
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-1"></i> No has subido ninguna tarea aún.
                </div>
            @else
                <div class="list-group">
                    @foreach($cursos as $curso)
                        <div class="list-group-item list-group-item-action mb-2 rounded shadow-sm">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1 text-primary">
                                        <i class="fas fa-book me-1"></i>{{ $curso->nombre_curso }}
                                        <span class="badge bg-secondary text-light ms-2">{{ $curso->tipo }}</span>
                                    </h5>
                                    <p class="mb-0 text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($curso->fecha_inicio)->format('d/m/Y') }} - 
                                        {{ \Carbon\Carbon::parse($curso->fecha_fin)->format('d/m/Y') }}
                                    </p>
                                </div>
                                <a href="{{ asset('storage/' . $curso->documento) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-download me-1"></i> Descargar PDF
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
