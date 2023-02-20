<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Deporte;
use App\Models\Video;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class DeporteController extends Controller
{

  use WithPagination;
  public function index()
  {
    $deportes = Deporte::paginate(8);
    $aux = Video::whereDate('FechaInicioVid', '>=', Carbon::now()->format('Y-m-d'))
      ->orderBy('FechaInicioVid', 'asc')
      ->take(5)
      ->get(); // todos los eventos mayores a la fehca <acultua></acultua>
      if(count($aux)<=5){
        $proximosEventos = $aux ;
      }else{
        $proximosEventos = $aux->take(5) ;
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


 


    return  view('client.deporte.index', compact('deportes', 'proximosEventos'));
  }

  public function show($idDeporte)
  {
    $deporte = Deporte::where('idDeporte', $idDeporte)->get();
    $campeonatos = Campeonato::where('idDeporte', $idDeporte)->paginate(3);
    $campeonatosTotal = Campeonato::where('idDeporte', $idDeporte)->get();
    $suscripciones = DB::table('suscripciones')
      ->where('idCliente', auth()->user()->id)
      ->get();




    $cliente = User::findOrFail(auth()->user()->id);
    $suscripciones = $cliente->videos;
    $videoSuscripcion = array();
    $i = 0;
    $videos = array();



    foreach ($suscripciones as $suscripcion) {
      //obteniendo datos de la tabla pivot suscripcion
      array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
    }


    foreach ($campeonatosTotal as $campeonato) {
      foreach ($campeonato->Videos as $video) {
        $videos[$i]  = $video;
        if (in_array($video->idVideo, $videoSuscripcion)) {
          $videos[$i]['subs'] = 1;
        } else {
          $videos[$i]['subs'] = 0;
        }
        $i++;
      }
    }



    
    $j=0;
    foreach ($campeonatos as $campeonnato) {
        $suma = 0 ;
        foreach ($campeonnato->Videos as $video) {
            if (in_array($video->idVideo, $videoSuscripcion)) {
                $suma = $suma + 1;
            } 
        }
        $campeonatos[$j]['subs'] = $suma;

        $j++;
    }





    return  view('client.deporte.show', compact('deporte', 'campeonatos', 'suscripciones', 'videos'));
  }
}
