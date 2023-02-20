<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class WowzaService
{
    private string $url;

    private string $token;

    public function __construct()
    {
        $this->url = 'https://api.video.wowza.com/api/'.env('WOWZA_API_VERSION','v1.9');
        $this->token = env('WOWZA_TOKEN');
    }

    public function createLivestream(string $name)
    {
        try {
            $data['live_stream'] = [
                'aspect_ratio_height' => 720,
                'aspect_ratio_width' => 1280,
                'billing_mode' => 'pay_as_you_go',
                'broadcast_location' => 'south_america_brazil',
                'encoder'=> 'other_rtmp',
                'name' => $name,
                'transcoder_type' => 'transcoded',
                'vod_stream' => true,
                'disable_authentication'=> true,
                'delivery_method' => 'push'
            ];
            $endpoint = $this->url.'/live_streams';
            $response = Http::withToken($this->token)->retry(3,1000)->post($endpoint,$data);
            return json_decode($response);
        } catch (Exception $e) {
            info('Create Livestream ERROR | '.$e->getMessage());
            throw $e;
        }
    }

    public function startLivestream(string $livestreamId)
    {
        try {
            $endpoint = $this->url.'/live_streams/'.$livestreamId.'/start';
            $response = Http::withToken($this->token)->retry(3,1000)->put($endpoint);
            return json_decode($response);
        } catch (Exception $e) {
            info('Start Livestream ERROR | '.$e->getMessage());
            throw $e;
        }
    }

    public function stopLivestream(string $livestreamId)
    {
        try {
            $endpoint = $this->url.'/live_streams/'.$livestreamId.'/stop';
            $response = Http::withToken($this->token)->retry(3,1000)->put($endpoint);
            return json_decode($response);
        } catch (Exception $e) {
            info('Stop Livestream ERROR | '.$e->getMessage());
            throw $e;
        }
    }

    public function fetchLivestreamState(string $livestreamId)
    {
        try {
            $endpoint = $this->url.'/live_streams/'.$livestreamId.'/state';
            $response = Http::withToken($this->token)->retry(3,1000)->get($endpoint);
            return json_decode($response);
        } catch (Exception $e) {
            info('Fetch Livestream State ERROR | '.$e->getMessage());
            throw $e;
        }
    }

    public function getVodByTranscoder(string $transcoderId)
    {
        try {
            $endpoint = $this->url.'/transcoders/'.$transcoderId.'/vod_streams';
            $response = Http::withToken($this->token)
                ->retry(3,1000)
                ->get($endpoint);
            return json_decode($response);
        } catch (Exception $e) {
            info('Fetch Transcoder ERROR | '.$e->getMessage());
            throw $e;
        }
    }

    public function getVod(string $vodId)
    {
        try {
            $endpoint = $this->url.'/vod_streams/'.$vodId;
            $response = Http::withToken($this->token)
                ->retry(3,1000)
                ->get($endpoint);
            return json_decode($response);
        } catch (Exception $e) {
            info('Fetch Transcoder ERROR | '.$e->getMessage());
            throw $e;
        }
    }
}
