<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campeonato;
use App\Models\Deporte;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class CampeonatoIndex extends Component
{
    use WithPagination;
    public $deporte_id ;
   
    public function render()
    {

      
        $campeonatos  = Campeonato::sport($this->deporte_id)->paginate(8);
        
        $deportes = Deporte::all();


        $suscripciones = DB::table('suscripciones')
        ->where('idCliente',auth()->user()->id)
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



 

      

        return view('livewire.campeonato-index',compact('campeonatos','deportes','videoSuscripcion'));
    }

    public function resetFilters(){
         $this->reset(['deporte_id']);
    }
}
