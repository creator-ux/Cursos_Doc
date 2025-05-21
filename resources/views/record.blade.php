@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">CÉDULA DE INSCRIPCIÓN</h1>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('cedula.store') }}" method="POST">
        @csrf

        <!-- Fecha -->
        <div class="mb-4" style="text-align: left;">
            <label class="form-label">Fecha:</label><br>
            <input type="date" name="fecha" class="form-control" style="width: 200px; display: inline-block;" required>
        </div>

        <!-- 1. Datos Personales -->
         <!-- Buscar por matrícula -->
        <div class="mb-4">
            <label for="buscar_matricula" class="form-label">Buscar por Matrícula:</label>
            <div class="input-group" style="max-width: 400px;">
                <input type="text" id="buscar_matricula" class="form-control" placeholder="Ingresa matrícula">
                <button type="button" class="btn btn-secondary" onclick="buscarPorMatricula()">Buscar</button>
            </div>
        </div>

        <h4>1. Datos Personales</h4>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="apellido_paterno" class="form-control" placeholder="Apellido Paterno" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_materno" class="form-control" placeholder="Apellido Materno" required>
            </div>
            <div class="col">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)" required>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
                <input type="text" name="rfc" class="form-control" placeholder="RFC" required>
            </div>
            <div class="col">
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono particular" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="email" required>
            </div>
        </div>

        <!-- 2. Estudios -->
        <h4>2. Estudios</h4>
        <div class="mb-3">
            @foreach (['Primaria', 'Secundaria', 'Carrera Técnica', 'Carrera Comercial', 'Bachillerato', 'Licenciatura','Maestría'] as $nivel)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="estudios[]" value="{{ $nivel }}">
                    <label class="form-check-label">{{ $nivel }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-3"> 
            <input type="text" name="carrera_nombre" class="form-control" placeholder="Nombre de la carrera cursada (Especificar años y/o meses)">
        </div>

        <!-- 3. Datos Laborales -->
        <h4>3. Datos Laborales</h4>
        <div class="mb-3">
            <label class="form-label">Tipo de Puesto:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_puesto" value="Base" required>
                <label class="form-check-label">Base</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_puesto" value="Confianza">
                <label class="form-check-label">Confianza</label>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" name="unidad_responsable" class="form-control" placeholder="Unidad Responsable" required>
        </div>
        <div class="mb-3">
            <input type="text" name="area" class="form-control" placeholder="Área" required>
        </div>
        <div class="mb-3">
            <input type="text" name="puesto_actual" class="form-control" placeholder="Puesto actual (que corresponda al talón de pago)">
        </div>
        <div class="mb-3">
            <input type="text" name="nombre_jefe" class="form-control" placeholder="Nombre del jefe inmediato">
        </div>
        <div class="mb-3">
            <input type="text" name="domicilio_oficial" class="form-control" placeholder="Domicilio oficial">
        </div>
        <div class="mb-3">
            <input type="text" name="telefono_oficial" class="form-control" placeholder="Teléfono oficial">
        </div>
        <div class="mb-3">
            <input type="text" name="extension" class="form-control" placeholder="Extensión">
        </div>
        <div class="mb-3">
            <input type="text" name="horario" class="form-control" placeholder="Horario laboral">
        </div>

        <!-- 4. Datos del Evento -->
        <h4>4. Datos del Evento</h4>
        <div class="mb-3">
            <input type="text" name="nombre_evento" class="form-control" placeholder="Nombre del evento" required>
        </div>
        <div class="mb-3">
            <input type="text" name="nombre_instructor" class="form-control" placeholder="Nombre del instructor" required>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Fecha de realización:</label>
                <input type="date" name="fecha_realizacion" class="form-control" required>
            </div>
            <div class="col">
                <label for="form-label">Horario:</label>
                <input type="time" name="horario_evento" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <input type="text" name="sede" class="form-control" placeholder="Sede del evento" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar Inscripción</button>
        </div>
    </form>

    <script>
    function buscarPorMatricula() {
        const matricula = document.getElementById('buscar_matricula').value;
        if (!matricula) return;

        fetch(`/buscar-matricula/${matricula}`)
            .then(res => res.json())
            .then(data => {
                if (!data.found) {
                    alert('Matrícula no encontrada.');
                    return;
                }

                // Datos Personales
                document.querySelector('input[name="apellido_paterno"]').value = data.maestro.apellido_paterno || '';
                document.querySelector('input[name="apellido_materno"]').value = data.maestro.apellido_materno || '';
                document.querySelector('input[name="nombre"]').value = data.maestro.nombre_completo || '';
                document.querySelector('input[name="rfc"]').value = data.maestro.rfc || '';
                document.querySelector('input[name="telefono"]').value = data.maestro.telefono || '';
                document.querySelector('input[name="email"]').value = data.maestro.email || '';

                // Datos Laborales
                if (data.laborales) {
                    document.querySelector('input[name="unidad_responsable"]').value = data.laborales.unidad_responsable || '';
                    document.querySelector('input[name="area"]').value = data.laborales.area || '';
                    document.querySelector('input[name="puesto_actual"]').value = data.laborales.tipo_puesto || '';
                    document.querySelector('input[name="nombre_jefe"]').value = data.laborales.nombre_jefe || '';
                    document.querySelector('input[name="domicilio_oficial"]').value = data.laborales.domicilio_oficial || '';
                    document.querySelector('input[name="telefono_oficial"]').value = data.laborales.telefono_oficial || '';
                    document.querySelector('input[name="extension"]').value = data.laborales.extension || '';
                    document.querySelector('input[name="horario"]').value = data.laborales.horario || '';
                }
            })
            .catch(error => {
                alert('Error al buscar la matrícula.');
                console.error(error);
            });
    }
    </script>

</div>
@endsection
