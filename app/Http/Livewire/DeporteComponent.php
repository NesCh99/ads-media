<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deporte;
class DeporteComponent extends Component
{

    use WithPagination;
    public function render()
    {

        $deportes = Deporte::paginate(8);

        $this->resetPage();
        return view('livewire.deporte-component',compact('deportes'));
    }
}
