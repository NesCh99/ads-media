<?php

namespace App\Jobs;

use App\Http\Services\WowzaService;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartLivestreamJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    private $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $wowzaService = new WowzaService();    
        $metadato = $this->video->MetaDato;
        $wowzaService->startLivestream($metadato->WowzaStreamingIdMetaDato);
        do {
            $status = $wowzaService->fetchLivestreamState($metadato->WowzaStreamingIdMetaDato);
            sleep(5);
        } while ($status->live_stream->state == 'starting');
        $metadato->StreamStatusMetaDato = $status->live_stream->state;
        $metadato->StartedAtMetaDato = Carbon::now();
        $metadato->save();
        info('Livestream started successfully');
        session()->flash('info', 'Transmisión en vivo iniciada correctamente');
        return redirect()->route('admin.videos.livestream', ['idVideo' => $this->video->idVideo]);
    }
}
