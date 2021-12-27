<?php

namespace App\Services;

use Sovit\TikTok\Api;

class TiktokService
{
    private $tiktok;

    public function __construct()
    { 
        $this->tiktok = new Api();
    }

    public function getVideos() {
        return $this->tiktok->getUserFeed(config('services.tiktok.user'),$maxCursor=0);
    }
}
