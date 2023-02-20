<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use App\Models\User;



use function GuzzleHttp\Promise\each;

class EventoController extends Controller
{
  public function index()
  {


    $datenow = new DateTime();
    $datenow = $datenow->format('Y-m-d');

    $videoActual = Video::whereDate('FechaInicioVid', '=', $datenow)->take(1)->get();

    $fechaActual =  Carbon::now()->format('Y-m-d');
    $aux = Video::whereDate('FechaInicioVid', '>', $fechaActual)
      ->orderBy('FechaInicioVid', 'asc')
      ->get();

    if (count($aux) <= 5) {
      $proximosEventos = $aux;
    } else {
      $proximosEventos = $aux->take(5);
    }



    $cliente = User::findOrFail(auth()->user()->id);
    $suscripciones = $cliente->videos;
    $videoSuscripcion = array();

    foreach ($suscripciones as $suscripcion) {
      //obteniendo datos de la tabla pivot suscripcion
      array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
    }
    $i = 0;
    foreach ($proximosEventos as $video) {

      if (in_array($video->idVideo, $videoSuscripcion)) {
        $proximosEventos[$i]['subs'] = 1;
      } else {
        $proximosEventos[$i]['subs'] = 0;
      }
      $i++;
    }


    $videos = Video::all();
    $i = 0;

    foreach ($videos as $video) {

      $calendario[$i] = ['title' => 'Evento : ' . $video->NombreVid, "start" => $video->FechaInicioVid, "url" => 'suscripcion/video/' . $video->idVideo];

      $i++;
    }

    $iniciar = json_encode($datenow);
    $calendario = json_encode($calendario);



    return view('client.evento.index', compact('proximosEventos', 'videoActual', 'calendario', 'iniciar'));
  }
}
