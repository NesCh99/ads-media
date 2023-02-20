<?php

namespace App\Http\Livewire;

use App\Models\Campeonato;
use Livewire\Component;

class SearchCampeonatoComponent extends Component
{
    public $search;
    
    public function render()
    {
        return view('livewire.search-campeonato-component');
    }


    public function getResultsProperty(){

        return Campeonato::where('NombreCam','LIKE','%'.$this->search .'%')->take(8)->get();

    }


}
