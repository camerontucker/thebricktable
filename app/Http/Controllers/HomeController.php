<?php

namespace App\Http\Controllers;

use App\Services\TiktokService;
use App\Services\YoutubeService;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(YoutubeService $youtube, TiktokService $tiktok)
    {
        //$instagram = Profile::where('username', 'services.instagram.feed')->first()->feed();

        $latestYoutubeVideo = "";
        try {
            $latestYoutubeVideo = $youtube->getLatestVideo();
        } catch(\Exception $e)
        {
            Log::alert($e->getMessage());
        }

        $tiktokVideos = [];
        try {
            $tiktokVideos = $tiktok->getVideos();
        } catch(\Exception $e)
        {
            Log::alert($e->getMessage());
        }

        return view('welcome')
        ->with('new_youtube',$latestYoutubeVideo)
        //->with('new_instagram',$instagram)
        ->with('new_tiktok',$tiktokVideos);
    }
}
