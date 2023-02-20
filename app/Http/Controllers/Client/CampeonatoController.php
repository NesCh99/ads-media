<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;

class CampeonatoController extends Controller
{
    public function index(){
       
        $campeonatos = Campeonato::paginate(2);
        return  view('client.campeonato.index',compact('campeonatos'));
        
    }

    public function show($idCampeonato){
          $campeonato =  Campeonato::findOrFail($idCampeonato);
          $cliente = User::findOrFail(auth()->user()->id);
          $suscripciones = $cliente->videos;
          $videoSuscripcion = array();
      
          foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
          }



          $i = 0;

          $videoSuscrito= null ;
          foreach ( $campeonato->Videos as $video) {
      
            if (in_array($video->idVideo, $videoSuscripcion)) {
                $videoSuscrito[$i] = $video;
            }
            $i++;
          }

        return  view('client.campeonato.show',compact('campeonato' ,'videoSuscrito'));


    }
}
