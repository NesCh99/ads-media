<?php

namespace App\Jobs;

use App\Http\Services\WowzaService;
use App\Models\Video;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StopLivestream implements ShouldQueue
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
        $wowzaService->stopLivestream($metadato->WowzaStreamingIdMetaDato);
        do {
            $status = $wowzaService->fetchLivestreamState($metadato->WowzaStreamingIdMetaDato);
            sleep(1);
        } while ($status->live_stream->state == 'stopping');
        $vodByTranscoder = $wowzaService->getVodByTranscoder($metadato->WowzaStreamingIdMetaDato);
        $vodInfo = $wowzaService->getVod($vodByTranscoder->vod_streams[0]->id);
        $metadato->StreamStatusMetaDato = $status->live_stream->state;
        $metadato->StreamHlsMetaDato = $vodInfo->vod_stream->playback_url;
        $metadato->save();
        info('Livestream stopped successfully');
        session()->flash('info', 'Transmisión en vivo detenida correctamente');
        return redirect()->route('admin.videos.livestream', ['idVideo' => $this->video->idVideo]);
    }
}
