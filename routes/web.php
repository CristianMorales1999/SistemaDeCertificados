<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/people',[PersonController::class,'index'])->name('people.index');

// Rutas de proyectos
Route::resource('proyectos', ProyectoController::class);
Route::get('/proyectos/{proyecto}/gestion', [ProyectoController::class, 'gestion'])->name('proyectos.gestion');
Route::post('/proyectos/{proyecto}/asociar-personas', [ProyectoController::class, 'asociarPersonas'])->name('proyectos.asociar-personas');
Route::post('/proyectos/{proyecto}/quitar-personas', [ProyectoController::class, 'quitarPersonas'])->name('proyectos.quitar-personas');
Route::post('/proyectos/{proyecto}/generar-certificados', [ProyectoController::class, 'generarCertificados'])->name('proyectos.generar-certificados');
Route::get('/proyectos/{proyecto}/certificados', [ProyectoController::class, 'certificados'])->name('proyectos.certificados');
Route::get('/certificados/{certificado}/pdf', [ProyectoController::class, 'generarCertificadoIndividual'])->name('certificados.pdf');

// Ruta de prueba para el template de certificado
Route::get('/test-certificado', [ProyectoController::class, 'testCertificado'])->name('test.certificado');

// Ruta para generar PDF personalizado desde la vista de generación
Route::get('/generar-pdf-personalizado', [ProyectoController::class, 'generarPDFPersonalizado'])->name('generar.pdf.personalizado');

// Ruta para generar certificados masivos
Route::get('/generar-certificados-masivos', [ProyectoController::class, 'generarCertificadosMasivos'])->name('generar.certificados.masivos');

// public
Route::get('/validar-codigo', function () {
    return view('certificates.validar-codigo');
}) ->name('validar-codigo');



/* -----------------GENERACIÓN DE CERTIFICADOS--------------- */
Route::get('/generacion-certificados', function () {
    return view('certificates.generacion-certificados');
}) ->name('generacion-certificados');
/* -----------------CREACIÓN DE GRUPO--------------- */
Route::get('/grupo-certificacion', function () {
    return view('certificates.grupo-certificacion');
}) ->name('grupo-certificacion');

/* -----------------CREACIÓN DE GRUPO (NUEVO - REFACTORIZADO)--------------- */
// Ruta temporal para el componente refactorizado
// TODO: Reemplazar ruta legacy cuando se valide este componente
Route::get('/grupos-certificacion/crear', \App\Livewire\GruposCertificacion\CrearGrupoCertificacion::class)
    ->middleware(['auth'])
    ->name('grupos.crear.nuevo');




Route::view('dashboard', 'admin/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
