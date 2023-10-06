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

    // Rutas para RedSocial
    Route::get('/redes-sociales', 'RedSocialController@listarRedesSociales')->name('redes_sociales.listar');
    Route::post('/unirse-red-social', 'RedSocialController@unirseRedSocial')->name('redes_sociales.unirse');
    Route::get('/redes-sociales/{id}', 'RedSocialController@mostrarRedSocial')->name('redes_sociales.mostrar');
    Route::post('/publicar-contenido', 'RedSocialController@publicarContenido')->name('redes_sociales.publicar');

    // Rutas para Comunicacion
    Route::get('/comunicaciones', 'ComunicacionController@listarComunicaciones')->name('comunicaciones.listar');
    Route::get('/comunicaciones/{id}', 'ComunicacionController@mostrarComunicacion')->name('comunicaciones.mostrar');
    Route::post('/enviar-comunicacion', 'ComunicacionController@enviarComunicacion')->name('comunicaciones.enviar');

    // Rutas para MembrasiaRedSocial
    Route::post('/unirse-red-social', 'MembresiaRedController@unirseRedSocial')->name('membresia-red.unirse');
    Route::post('/abandonar-red-social', 'MembresiaRedController@abandonarRedSocial')->name('membresia-red.abandonar');

    // Rutas para OportunidaEmpleo
    Route::get('/oportunidades', 'OportunidadEmpleoController@index')->name('oportunidades.index');
    Route::get('/oportunidades/crear', 'OportunidadEmpleoController@crear')->name('oportunidades.crear');
    Route::post('/oportunidades/guardar', 'OportunidadEmpleoController@guardar')->name('oportunidades.guardar');
    Route::get('/oportunidades/editar/{id}', 'OportunidadEmpleoController@editar')->name('oportunidades.editar');
    Route::put('/oportunidades/actualizar/{id}', 'OportunidadEmpleoController@actualizar')->name('oportunidades.actualizar');
    Route::delete('/oportunidades/eliminar/{id}', 'OportunidadEmpleoController@eliminar')->name('oportunidades.eliminar');

    // Rutas para Mentoria
    Route::get('/mentorias', 'MentoriaController@index')->name('mentorias.index');
    Route::get('/mentorias/crear', 'MentoriaController@crear')->name('mentorias.crear');
    Route::post('/mentorias/guardar', 'MentoriaController@guardar')->name('mentorias.guardar');
    Route::get('/mentorias/editar/{id}', 'MentoriaController@editar')->name('mentorias.editar');
    Route::put('/mentorias/actualizar/{id}', 'MentoriaController@actualizar')->name('mentorias.actualizar');
    Route::delete('/mentorias/eliminar/{id}', 'MentoriaController@eliminar')->name('mentorias.eliminar');

    //Rutas para Donacion
    Route::get('/donaciones', 'DonacionController@index')->name('donaciones.index');
    Route::get('/donaciones/crear', 'DonacionController@crear')->name('donaciones.crear');
    Route::post('/donaciones/guardar', 'DonacionController@guardar')->name('donaciones.guardar');
    Route::get('/donaciones/editar/{id}', 'DonacionController@editar')->name('donaciones.editar');
    Route::put('/donaciones/actualizar/{id}', 'DonacionController@actualizar')->name('donaciones.actualizar');
    Route::delete('/donaciones/eliminar/{id}', 'DonacionController@eliminar')->name('donaciones.eliminar');

    //Rutas para Usuario
    Route::get('/registrar', 'UsuarioController@registrar')->name('registrar');
    Route::post('/registrar', 'UsuarioController@guardarRegistro')->name('guardarRegistro');
    Route::middleware(['auth'])->group(function () {
        Route::get('/perfil', 'UsuarioController@perfil')->name('perfil');
        //Route::get('/perfil/editar', 'UsuarioController@editarPerfil')->name('editarPerfil');
        //Route::put('/perfil/editar', 'UsuarioController@actualizarPerfil')->name('actualizarPerfil');
    });

    //Rutas para Rol
    Route::middleware(['auth'])->group(function () {
        Route::get('/roles', 'RolController@index')->name('roles.index');
        Route::get('/roles/crear', 'RolController@crear')->name('roles.crear');
        Route::post('/roles/crear', 'RolController@guardar')->name('roles.guardar');
        Route::get('/usuarios/{usuario}/asignar-rol', 'RolController@asignarRol')->name('roles.asignar');
        Route::post('/usuarios/{usuario}/asignar-rol', 'RolController@guardarAsignacion')->name('roles.guardarAsignacion');
    });

    //Rutas para RegistroActividad
    Route::middleware(['auth'])->group(function () {
        Route::get('/actividades', 'RegistroActividadController@index')->name('actividades.index');
        Route::post('/actividades/registrar', 'RegistroActividadController@registrar')->name('actividades.registrar');
    });

    //Rutas para Informe
    Route::middleware(['auth'])->group(function () {
        Route::get('/informes', 'InformeController@index')->name('informes.index');
        Route::get('/informes/create', 'InformeController@create')->name('informes.create');
        Route::post('/informes', 'InformeController@store')->name('informes.store');
        Route::get('/informes/{informe}', 'InformeController@show')->name('informes.show');
    });
    



});
