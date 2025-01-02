<?php

use App\Http\Controllers\ConfiguracionCalendarioController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TipoUsuariosController;

use Illuminate\Support\Facades\Route;

Route::view('/login', "administracion.login")->name('login');
Route::view('/registrar_usuario', "administracion.registrar_usuario")->name('registrar_usuario');
Route::view('/formulario_gratuidad', 'administracion.formulario_gratuidad')->name('formulario_gratuidad');
Route::view('/welcome', 'formulario-reservas.welcome')->name('welcome');
Route::view('/cambio_contrasena', 'administracion.cambio_contrasena')->name('cambio_contrasena');
Route::view('/formulario', 'formulario-reservas.formulario')->name('formulario');
Route::view('/quienes_somos', 'formulario-reservas.quienes_somos')->name('quienes_somos');
Route::view('/horarios_tarifas', 'formulario-reservas.horarios_tarifas')->name('horarios_tarifas');
Route::view('/reglamentos', 'formulario-reservas.reglamentos')->name('reglamentos');
Route::view('/tercera_etapa', 'tercera_etapa.tercera_etapa')->name('tercera_etapa');
Route::view('/deportivas', 'tercera_etapa.deportivas')->name('deportivas');
Route::view('/educacion_ambiental', 'tercera_etapa.educacion_ambiental')->name('educacion_ambiental');
Route::view('/juegos_infantiles', 'tercera_etapa.juegos_infantiles')->name('juegos_infantiles');
Route::view('/vida_natural', 'tercera_etapa.vida_natural')->name('vida_natural');


Route::get('/filtrar', [TipoUsuariosController::class, 'filtrarPorFecha'])->name('filtrar');
Route::get('/privada', [TipoUsuariosController::class, 'index'])->name('privada')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [ReservasController::class, 'index'])->name('reservas.index');
Route::get('/create', [ReservasController::class, 'create'])->name('reservas.create');
Route::get('/historial', [TipoUsuariosController::class, 'historial'])->middleware('auth')->name('historial');
Route::get('/administrar_calendario', [TipoUsuariosController::class, 'index'])->middleware('auth')->name('administrar.calendario');
Route::get('/reservas_pdf', [TipoUsuariosController::class, 'generarPDF'])->name('reservas.pdf');
Route::get('/historico_reservas_pdf', [TipoUsuariosController::class, 'generarPDFHistorico'])->name('historico.reservas.pdf');
Route::get('/reserva_especifica_pdf{id}', [TipoUsuariosController::class, 'generarPDFespecifico'])->name('reserva.especifica.pdf');
Route::get('/administrar_calendario', [TipoUsuariosController::class, 'modificarCalendario'])->name('administrar.calendario');
Route::get('/disabled-dates', [ConfiguracionCalendarioController::class, 'disabledDates'])->name('disabled-dates');
Route::get('/exportar', [TipoUsuariosController::class, 'exportar'])->name('exportar');
Route::get('/exportarHistorial', [TipoUsuariosController::class, 'exportarHistorial'])->name('exportarHistorial');

Route::post('/store', [ReservasController::class, 'store'])->name('reservas.store');
Route::post('/formulario-gratuidad', [ReservasController::class, 'formularioGratuidad'])->name('reservas.formulario.gratuidad');
Route::post('validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::post('/validar-reserva', [ReservasController::class, 'validarReserva']);
Route::post('/validar-reservas-duplicadas', [ReservasController::class, 'ValidarReservasDuplicadas']);
Route::post('/quinchos-disponibles', [ReservasController::class, 'getDisponibles']);
Route::post('/cambiar-estado-quincho', [TipoUsuariosController::class, 'cambiarEstado']);
Route::post('/verificar-estado-quincho', [TipoUsuariosController::class, 'verificarEstado'])->name('verificar.estado.quincho');
Route::post('/desactivar-mes', [ConfiguracionCalendarioController::class, 'desactivarMes'])->name('desactivar-mes');
Route::post('/activar-mes', [ConfiguracionCalendarioController::class, 'activarMes'])->name('activar-mes');
Route::post('/desactivar-dia', [ConfiguracionCalendarioController::class, 'desactivarDia'])->name('desactivar-dia');
Route::post('/activar-dia', [ConfiguracionCalendarioController::class, 'activarDia'])->name('activar-dia');
Route::post('/cambiar-contrasena', [LoginController::class, 'cambiarContrasena'])->name('cambiar-contrasena');
Route::post('/disponibilidad-dia', [ReservasController::class, 'disponibilidadDia'])->name('disponibilidad.dia');










