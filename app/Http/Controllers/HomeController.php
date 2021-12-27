<?php

namespace App\Http\Controllers;

use App\Services\TiktokService;
use App\Services\YoutubeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(YoutubeService $youtube, TiktokService $tiktok)
    {
        return view('welcome')
        ->with('new_youtube',$youtube->getVideos())
        ->with('new_tiktok',$tiktok->getVideos());
    }
}
