<?php

namespace App\Http\Livewire\Admin\Clientes;

use App\Models\User;
use App\Models\Video;
use Livewire\Component;

class Show extends Component
{
    public $available = 1;

    public $clienteId;

    public function render()
    {
        $cliente = User::findOrFail($this->clienteId);
        if($this->available === 1){
            $videosSuscritos = $cliente->videos()->wherePivot('TipoSus',Video::GIFT)->get();
            $videos = Video::whereNotIn('idVideo',$videosSuscritos->pluck('idVideo')->toArray())->get();
        }else{
            $videos = $cliente->videos()->wherePivot('TipoSus',Video::GIFT)->get();            
        }
        return view('livewire.admin.clientes.show',[
            'videos' => $videos,
            'cliente' => $cliente
        ]);
    }

    public function changeSus($value)
    {
        $this->available = $value;
    }
}
