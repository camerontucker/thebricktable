<?php

namespace App\Services;

use Alaouy\Youtube\Youtube;

class YoutubeService
{
    private $youtube;

    public function __construct()
    { 
        $this->youtube = new Youtube(config('services.youtube.key'));
    }

    public function getVideos() {
        return cache()->remember(
            "youtube_videos",
            60*5,
            fn() => $this->youtube->listChannelVideos(config('services.youtube.channel'),40)
        );
    }
}
