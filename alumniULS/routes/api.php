<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExalumnoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AsistenciaEventoController;
use App\Http\Controllers\RedSocialController;
use App\Http\Controllers\ComunicacionController;
use App\Http\Controllers\MembresiaRedController;
use App\Http\Controllers\OportunidadEmpleoController;
use App\Http\Controllers\MentoriaController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RegistroActividadController;
use App\Http\Controllers\InformeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/hello', function () {
    return "Hello World!";
  });

Route::post('/reverse-me', function (Request $request) {
$reversed = strrev($request->input('reverse_this'));
return $reversed;
});

Route::get('roles', [RolController::class, 'getAll']);
Route::post('add-rol', [RolController::class, 'adding']);