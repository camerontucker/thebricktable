<?php

namespace App\Services;

use Alaouy\Youtube\Youtube;

class YouTubeService
{
    private $youtube;

    public function __construct()
    { 
        $this->youtube = new Youtube(config('services.youtube.key'));
    }

    public function getVideos() {
        return $this->youtube->listChannelVideos(config('services.youtube.channel'),40);
    }
}
