<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Search extends Component
{

    public $search;
   

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){

        return Video::where('NombreVid','LIKE','%'.$this->search .'%')->take(8)->get();

    }
}
