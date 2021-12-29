<?php

namespace App\Services;

use Dymantic\InstagramFeed\InstagramFeed;

class InstagramService
{
    public function getFeed() {
        return []; // try catch can't handle instantiation without auth
        return InstagramFeed::for(config('services.instagram.feed'));
    }
}
