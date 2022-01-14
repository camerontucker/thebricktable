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

    public function getLatestVideo() {
        $activities = cache()->remember(
            "youtube_activities",
            60*5,
            fn() => $this->youtube->getActivitiesByChannelId(config('services.youtube.channel'))
        );

        $latestActivityVideo = "";
        $latestActivityDate = null;
        if(!empty($activities)) {
            foreach($activities as $activity) {
                if(isset($activity->contentDetails) &&
                isset($activity->contentDetails->upload) &&
                isset($activity->contentDetails->upload->videoId) &&
                !empty($activity->contentDetails->upload->videoId)) {
                    if(is_null($latestActivityDate) || $activity->snippet->publishedAt > $latestActivityDate) {
                        $latestActivityVideo = $activity->contentDetails->upload->videoId;
                        $latestActivityDate = $activity->snippet->publishedAt;
                    }
                }
            }
        }

        $videos = cache()->remember(
            "youtube_videos",
            60*60,
            fn() => $this->youtube->listChannelVideos(config('services.youtube.channel'),40)
        );

        $latestVideo = "";
        $latestVideoDate = null;
        foreach($videos as $video) {
            if(isset($video->id) &&
            isset($video->id->videoId) &&
            !empty($video->id->videoId)) {
                if(is_null($latestVideoDate) || $video->snippet->publishedAt > $latestVideoDate) {
                    $latestVideo = $video->id->videoId;
                    $latestVideoDate = $video->snippet->publishedAt;
                }
            }
        }

        if($latestActivityDate > $latestVideoDate)
            return $latestActivityVideo;

        return $latestVideo;
    }
}
