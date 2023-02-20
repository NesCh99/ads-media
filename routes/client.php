<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\DeporteController;
use App\Http\Controllers\Client\CampeonatoController;
use App\Http\Controllers\Client\VideoController;
use App\Http\Controllers\Client\EventoController;
use App\Http\Controllers\Client\SuscripcionController;
use App\Http\Controllers\Client\PagoController;
Route::get('', [HomeController::class, 'home'])->name('cliente.home');



Route::get('/ads-sports/about', [HomeController::class, 'about'])->name('cliente.empresa.about');
Route::get('/ads-sports/condiciones-de-uso', [HomeController::class, 'terminos'])->name('cliente.empresa.terminos');
Route::get('/ads-sports/politicas-de-privacidad', [HomeController::class, 'politicas'])->name('cliente.empresa.politicas');

Route::get('/ads-sports/contactos', [HomeController::class, 'contactos'])->name('cliente.empresa.contactos');
/*ruta para visualizar las vistas del cliente*/
Route::get('/deportes', [DeporteController::class, 'index'])->name('cliente.deportes.index');
Route::get('/deporte/{idDeporte}', [DeporteController::class, 'show'])->name('cliente.deporte.show');
Route::get('/campeonatos', [CampeonatoController::class, 'index'])->name('cliente.campeonatos.index');

Route::get('/videos', [VideoController::class, 'index'])->name('cliente.videos.index');
Route::get('/eventos', [EventoController::class, 'index'])->name('cliente.eventos.index');
Route::post('/comentario/video/{idVideo}', [VideoController::class,'comentario'])->name('cliente.comentario.video');

Route::resource('comentarios', VideoController::class)->names('client.comentarios');
/* */
Route::get('/suscripciones', [SuscripcionController::class, 'suscripcion'])->name('cliente.suscripcion.index');
Route::get('/pagos', [SuscripcionController::class, 'pago'])->name('cliente.pago.index');


Route::get('/suscripcion/eventos/campeonato/{idCampeonato}', [CampeonatoController::class, 'show'])->name('cliente.campeonato.show');
/*rutas para suscripcion */

/*suscripcion video */
Route::get('/suscripcion/video/{idVideo}', [SuscripcionController::class, 'suscripcionVideo'])->name('cliente.suscripcion.video');
/*suscripcion campeonato */
Route::get('/suscripcion/campeonato/{idCampeonato}', [SuscripcionController::class, 'suscripcionCampeonato'])->name('cliente.suscripcion.campeonato');

/*pago checkout paypal campeonato*/
Route::post('/pago/paypal/campeonato/{idCampeonato}', [PagoController::class, 'pagoCampeonato'])->name('cliente.pago.paypal.campeonato');
Route::get('/status/pago/campeonato/{idVideo}', [PagoController::class, 'statusCampeonato'])->name('cliente.paypal.status');
Route::get('/campeonato/suscrito', [PagoController::class, 'pagoCampeonatoCompleto'])->name('cliente.pago.campeonato.estado');

/*pago tarjeta de credito campeonato*/
Route::get('/pago/paypal/campeonato/{orderId}', [PagoController::class, 'tarjetaCampeonato'])->name('cliente.pago.tarjeta.campeonato');

/*pago checkout paypal video*/
Route::post('/pago/paypal/video/{idCampeonato}', [PagoController::class, 'pagoVideo'])->name('cliente.pago.paypal.video');
Route::get('/status/pago/video/{idVideo}', [PagoController::class, 'statusVideo'])->name('cliente.paypal.status');
Route::get('/video/suscrito', [PagoController::class, 'pagoVideoCompleto'])->name('cliente.pago.video.estado');


Route::get('/video/suscrito', [PagoController::class, 'pagoVideoCompleto'])->name('cliente.pago.video.estado');
/*pago tarjeta de credito video*/
Route::get('/pago/paypal/video/{orderId}', [PagoController::class, 'tarjetaVideo'])->name('cliente.pago.tarjeta.video');



/*rutas de erro del cliennte */


Route::get('/pago/paypal/fallo', [PagoController::class, 'error'])->name('cliente.pago.fallo');


/*ACTUALIZAR EL BILLING DESDE LA VISTA PAGO VIDEO  - PAGO*/
Route::resource('billings', SuscripcionController::class)->names('client.billings');
Route::put('/suscripcion/video/{idBilling}', [SuscripcionController::class, 'update'])->name('cliente.billing.update');









