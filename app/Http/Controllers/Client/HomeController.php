<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Models\Company;
use App\Models\Deporte;
use App\Models\Publicidad;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {


        $publicidades = Publicidad::all();
       
       
        $aux1 = Deporte::all();
        $aux2 = Campeonato::all();

        if(count($aux1)<=6){
            $deportes = $aux1;
        }else{
            $deportes = $aux1->take(6);
        }


        if(count($aux2)<=10){
            $campeonatos = $aux2;
        }else{
            $campeonatos = $aux2->take(10);
        }
        




        $videos = Video::all();

        $i = 0;
        foreach ($deportes as $deporte) {
            $sumaCmapeonatos = 0;
            $sumaVideos = 0;
            foreach ($deporte->Campeonatos as $campeonato) {
                if ($deporte->idCampeonato == $campeonato->idCampeonato) {
                    $sumaCmapeonatos = $sumaCmapeonatos + 1;
                }

                foreach ($campeonato->Videos as $video) {

                    $sumaVideos =   $sumaVideos + 1;
                }
            }

            $deportes[$i]['campeonatos'] = $sumaCmapeonatos;
            $deportes[$i]['videos'] = $sumaVideos;
            $i++;
        }
        $suscripciones = DB::table('suscripciones')
            ->where('idCliente', auth()->user()->id)
            ->get();

        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla  suscripcion
            array_push($videoSuscripcion, $suscripcion->idVideo);
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

        


      


        $videosEstado = $this->videos();


        return view('client.home', compact(
            'publicidades',
            'deportes',
            'campeonatos',
            'videos',
            'suscripciones',
            'videosEstado'

        ));
    }


    public function videos()
    {
        $videos = Video::all();
        $cliente = User::findOrFail(auth()->user()->id);
        $suscripciones = $cliente->videos;
        $videoSuscripcion = array();

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }
        $i = 0;
        foreach ($videos as $video) {

            if (in_array($video->idVideo, $videoSuscripcion)) {
                $videos[$i]['subs'] = 1;
            } else {
                $videos[$i]['subs'] = 0;
            }
            $i++;
        }

         if(count($videos)<=10){
            return $videos;
         }else{
            return $videos->take(10);
         }

        
    }

    public function about()
    {


        $icons = collect([
            ['id' => 1, 'icon' => 'fa-solid fa-video'],
            ['id' => 2, 'icon' => 'fa-solid fa-play'],
            ['id' => 3, 'icon' => 'fa-solid fa-circle-play'],
            ['id' => 4, 'icon' => 'fa-solid fa-headphones'],
            ['id' => 5, 'icon' => 'fa-solid fa-podcast'],
            ['id' => 6, 'icon' => 'fa-solid fa-tv'],
            ['id' => 7, 'icon' => 'fa-solid fa-image'],
            ['id' => 8, 'icon' => 'fa-solid fa-location-dot'],
            ['id' => 9, 'icon' => 'fa-solid fa-music'],
            ['id' => 10, 'icon' => 'fa-regular fa-clipboard'],
            ['id' => 11, 'icon' => 'fa-solid fa-pen'],
            ['id' => 12, 'icon' => 'fa-solid fa-gear'],
            ['id' => 13, 'icon' => 'fa-solid fa-tag'],
            ['id' => 14, 'icon' => 'fa-solid fa-camera'],
            ['id' => 15, 'icon' => 'fa-solid fa-pen-to-square'],
            ['id' => 16, 'icon' => 'fa-regular fa-comments'],
            ['id' => 17, 'icon' => 'fa-solid fa-code'],
            ['id' => 18, 'icon' => 'fa-solid fa-earth-americas'],
            ['id' => 19, 'icon' => 'fa-solid fa-palette'],
            ['id' => 20, 'icon' => 'fa-solid fa-puzzle-piece'],

        ]);


        $company = Company::find(1);
     
        return view('empresa.about',compact('company','icons'));
    }

    public function terminos()
    {
        $company = Company::find(1);
        
         $term = $company->terms->find(1);
         
        return view('empresa.terminos',compact('term'));
    }




    public function politicas()
    {
        $company = Company::find(1);
        
         $term = $company->terms->find(2);
         
        return view('empresa.politicas',compact('term'));
    }




    public function contactos()
    {
        return view('empresa.contactos');
    }


}
