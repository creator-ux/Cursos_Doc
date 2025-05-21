@extends('layouts.app')

@section('content')
        <div class="card text-center shadow p-4" style="max-width: 400px;">

                <h4 class="mb-3">Constancias Generadas</h4>
                <p class="mb-4">Haz clic en el botón para descargar los documentos.</p>
                
                <a href="{{ route('GenerarConstancia') }}" class="btn btn-success">Descargar aquí</a>
        </div><br>

        <div class="card text-center shadow p-4" style="max-width: 400px;">

        <h4 class="mb-3">Reconocimientos Generados</h4>
        <p class="mb-4">Haz clic en el botón para descargar los documentos.</p>
        
        <a href="{{ route('GenerarReconocimiento') }}" class="btn btn-success">Descargar aquí</a>
</div>
@endsection