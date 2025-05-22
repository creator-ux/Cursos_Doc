<?php

//Controladores de las rutas
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\CedulaController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\MaestroPeriodoController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
     if (Auth::check()) {
         return Auth::user()->rol === 0 ? redirect()->route('admin') : redirect()->route('usuario');
     }
     return redirect()->route('login');
 });
 
 // ----------------PARTE DE RICARDO----------------//
 
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
 
 //Apartado de rutas protegidas
 Route::middleware(['auth'])->group(function () {
 
     // Ruta de registro a los cursos
     Route::get('/record', [RecordController::class, 'index'])->name('record');
 
     // Ruta de descarga del PDF
     Route::get('/documents', function () {
         return view('DownloadPdf');
     })->name('DownloadPdf');
 
     // Generador de constancia
     Route::get('/generator', function () {
         $data = [
             'nombre' => 'Juan Alberto Quijano Pérez',
             'curso' => 'Introducción a Laravel',
             'N_registro' => 'TECNM_001',
             'fecha_inicio' => '15',
             'fecha_final' => '25',
             'horas' => '25'
         ];
         $pdf = Pdf::loadView('pdf.GeneratorPdf', $data);
         return $pdf->download('constancia.pdf');
     })->name('GenerarConstancia');
 
     // Generador de reconocimiento
     Route::get('/generator1', function () {
         $data = [
             'nombre' => 'Juan Alberto Quijano Pérez',
             'curso' => 'Introducción a Laravel',
             'N_registro' => 'TECNM_001',
             'fecha_inicio' => '15',
             'fecha_final' => '25',
             'horas' => '25'
         ];
         $pdf = Pdf::loadView('pdf.GeneratorPdf1', $data);
         return $pdf->download('Reconocmiento.pdf');
     })->name('GenerarReconocimiento');
 
     // Rutas de cédula
     Route::post('/cedula/store', [CedulaController::class, 'store'])->name('cedula.store');
     Route::get('/cedula/create', [CedulaController::class, 'create'])->name('cedula.create');
 
     // Ruta para cerrar sesión
     Route::get('/logout', function () {
         Auth::logout();
         return redirect('/login');
     })->name('logout');
 
     // Dashboards
     Route::get('/dashboard-admin', function () {
         return view('components.dashboard-a');
     })->name('dashboard.admin');
 
     Route::get('/dashboard-user', function () {
         return view('components.dashboard-u');
     })->name('dashboard.user');
 
//----------PARTE DE SHIVA--------------------------    
     
// ruta crear periodo funcional
Route::resource('periodos', PeriodoController::class);

// ruta para asignar maestros (solo create y store)
Route::resource('periodos.maestros', MaestroPeriodoController::class)
     ->only(['create', 'store'])
     ->names([
         'create' => 'periodos.maestros.create',
         'store' => 'periodos.maestros.store'
     ]);

Route::prefix('periodos/{periodo}')->group(function () {
    // para ver maestros asignados
    Route::get('maestros', [MaestroPeriodoController::class, 'show'])
         ->name('periodos.maestros.show');
});

// eliminar maestro asignado
Route::delete('periodos/{periodo}/maestros/{maestro}', [MaestroPeriodoController::class, 'destroy'])
     ->name('periodos.maestros.destroy');

//-----------asistencia------------
Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');
Route::post('/asistencias/individual', [AsistenciaController::class, 'storeIndividual'])->name('asistencias.individual');

//--------ver asistencias----------
Route::get('/periodos/{periodo}/asistencias-dias', [AsistenciaController::class, 'verDiasRegistrados'])
    ->name('asistencias.dias');

// Vista usuario
Route::get('/usuario', function () {
     return view('home');
 })->name('usuario');

 // Vista admin
 Route::middleware(['admin'])->group(function () {
     Route::get('/admin', function () {
         return view('home');
     })->name('admin');
 });

 // Rutas para búsqueda dinámica
 Route::get('/buscar-matricula/{matricula}', [CedulaController::class, 'buscarPorMatricula']);
 Route::get('/curso/{id}', [CursoController::class, 'getCurso']);
});