<?php

namespace App\Http\Controllers;

use App\Services\YoutubeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(YoutubeService $youtube)
    {
        return view('welcome')
        ->with('new_videos',$youtube->getVideos());
    }
}
