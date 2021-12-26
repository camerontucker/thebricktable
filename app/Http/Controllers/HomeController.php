<?php

namespace App\Http\Controllers;

use App\Services\YouTubeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(YouTubeService $youtube)
    {
        return view('welcome')
        ->with('new_videos',$youtube->getVideos());
    }
}
