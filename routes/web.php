<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/people',[PersonController::class,'index'])->name('people.index');

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
