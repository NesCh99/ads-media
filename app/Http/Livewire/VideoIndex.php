<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campeonato;
use App\Models\Deporte;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\User;

class VideoIndex extends Component
{

    use WithPagination;
    public $deporte_id;
   

    public function render()
    {


        
        $videos = Video::paginate(9);
        $deportes = Deporte::all();

        $cliente = User::findOrFail(auth()->user()->id);
        $suscripciones = $cliente->videos;
        $videoSuscripcion = array();

        $campeonatos  = Campeonato::sport($this->deporte_id)->paginate(5);

        foreach ($suscripciones as $suscripcion) {
            //obteniendo datos de la tabla pivot suscripcion
            array_push($videoSuscripcion, $suscripcion->pivot->idVideo);
        }
        $i=0;
        foreach($videos as $video){

            if (in_array($video->idVideo, $videoSuscripcion)) {
                $videos[$i]['subs'] = 1;
            }else{
                $videos[$i]['subs'] = 0;
            }
           $i++;
        }

    
        return view('livewire.video-index', compact('videos', 'deportes', 'suscripciones','campeonatos','videoSuscripcion'));
    }


    public function resetFilters()
    {
        $this->reset(['deporte_id']);
    }
}
