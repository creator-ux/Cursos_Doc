<nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('record') }}"> <!-- Aréa de registro a cursos -->
                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div> 
                Registro
        </a>
        
        <!-- <a class="nav-link" href="{{ route('DownloadPdf') }}">Constancias Generador</a> Aréa de constancias PROXIMAMENTE -->

        <a class="nav-link" href="{{ route('periodos.index') }}"><!-- Aréa de periodos -->
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                Cursos registrados
        </a>
        
        <a class="nav-link" href="{{ route('cursos.tareas') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Actividades
        </a>
</nav>