@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="card-title text-primary">Bienvenid@ {{ $usuario->nombre_completo }}</h2>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">📚 Cursos Asignados</h4>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($cursos as $curso)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $curso->nombre_curso }}</strong><br>
                            <small class="text-muted">
                                {{ $curso->periodo->nombre_periodo ?? 'Sin periodo' }} | 
                                {{ \Carbon\Carbon::parse($curso->fecha_inicio)->format('d/m/Y') }} - 
                                {{ \Carbon\Carbon::parse($curso->fecha_fin)->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>

                    {{-- Formulario para subir PDF --}}
                    <form action="{{ route('cursos.subirDocumento', $curso->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="documento" accept="application/pdf" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Subir PDF</button>
                        </div>
                        @error('documento')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </form>

                    {{-- Mostrar enlace solo si hay documento --}}
                    @if ($curso->documento)
                        <div class="mt-3 d-flex align-items-center">
                            <span class="me-2 fs-4">📄</span>
                            <a href="{{ asset('storage/' . $curso->documento) }}" target="_blank" class="text-primary fw-semibold text-decoration-none">
                                Ver documento
                            </a>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">🗓️ Días de Asistencia</h4>
        </div>
        <div class="card-body p-0">
            @if($asistencias->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') }}</td>
                                    <td>
                                        {{ $asistencia->periodo->nombre_periodo ?? 'Sin periodo' }}
                                        ({{ $asistencia->periodo->fecha_inicio ?? '-' }} - {{ $asistencia->periodo->fecha_fin ?? '-' }})
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-3 text-muted">No hay asistencias registradas.</div>
            @endif
        </div>
    </div>
</div>
@endsection
