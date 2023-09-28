<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommunicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Rutas para exalumnos
    Route::resource('exalumnos', ExalumnoController::class);

    // Rutas para eventos
    Route::resource('eventos', EventoController::class);

    // Rutas para asistencia evento
    Route::post('/marcar-asistencia', 'AsistenciaEventoController@marcarAsistencia')->name('asistencia.marcar');
    Route::get('/asistencia/{id}/editar', 'AsistenciaEventoController@editarAsistencia')->name('asistencia.editar');
    Route::put('/asistencia/{id}', 'AsistenciaEventoController@actualizarAsistencia')->name('asistencia.actualizar');
    Route::delete('/asistencia/{id}', 'AsistenciaEventoController@eliminarAsistencia')->name('asistencia.eliminar');

    // Rutas para 
});
