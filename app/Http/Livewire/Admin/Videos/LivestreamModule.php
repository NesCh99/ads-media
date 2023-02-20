<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Http\Services\WowzaService;
use App\Jobs\StartLivestreamJob;
use App\Jobs\StopLivestream;
use App\Models\MetaDato;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Illuminate\Support\Str;


class LivestreamModule extends Component
{
    public $idVideo;

    public $hasLivestream;

    public $livestreamState;

    public $showPlayer;

    public $showButtons;

    public function render()
    {
        $video = Video::findOrFail($this->idVideo);
        $metadato = MetaDato::where('idVideo',$this->idVideo)->first();
        if (!is_null($metadato)) {
            $this->hasLivestream = true;
            $this->livestreamState = $metadato->getStateName();
            if ($this->livestreamState == 'En Vivo') {
                $this->showPlayer = true;
            }
            if ($this->livestreamState == 'Finalizado' && !is_null($metadato->StartedAtMetaData)) {
                $this->showPlayer = true;
                $this->showButtons = false;
            }
        } else {
            $this->hasLivestream = false;
            $this->showPlayer = false;
            $this->showButtons = true;
        }
        return view('livewire.admin.videos.livestream-module', compact(['video','metadato']));
    }

    public function createLivestream() 
    {   
        $wowzaService = new WowzaService();     
        $video = Video::findOrFail($this->idVideo);
        $livestream = $wowzaService->createLivestream($video->NombreVid);
        $status = $wowzaService->fetchLivestreamState($livestream->live_stream->id);
        MetaDato::create([
            'idVideo' => $this->idVideo,
            'WowzaStreamingIdMetaDato' => $livestream->live_stream->id,
            'StreamServerMetaDato' => $livestream->live_stream->source_connection_information->primary_server,
            'StreamKeyMetaDato' => $livestream->live_stream->source_connection_information->stream_name,
            'StreamStatusMetaDato' => $status->live_stream->state,
            'StreamHlsMetaDato' => $livestream->live_stream->player_hls_playback_url,
            'StartedAtMetaDato' => null
        ]);
        session()->flash('info', 'Transmisión en vivo creada correctamente');
        return redirect()->route('admin.videos.livestream', ['idVideo' => $this->idVideo]);
    }

    public function startLivestream()
    {
        $video = Video::findOrFail($this->idVideo);
        if (Carbon::now() < $video->FechaInicioVid) {
            session()->flash('info', 'La fecha actual es menor a la que inicia el evento, no se inicio transmisión');
            return redirect()->route('admin.videos.livestream', ['idVideo' => $this->idVideo]);
        }
        $jobs = [];
        $jobs[] = new StartLivestreamJob($video);
        Bus::batch($jobs)->name('StartLivestream')->dispatch();
    }

    public function stopLivestream()
    {
        $video = Video::findOrFail($this->idVideo);
        $jobs = [];
        $jobs[] = new StopLivestream($video);
        Bus::batch($jobs)->name('StopLivestream')->dispatch();
    }
}
