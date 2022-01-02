<?php

namespace App\Services;

use Dymantic\InstagramFeed\InstagramFeed;

class InstagramService
{
    public function getFeed() {
        return InstagramFeed::for(config('services.instagram.feed'));
    }
}
