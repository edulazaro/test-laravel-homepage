<?php

namespace App\Http\Controllers;

use App\Services\VideoService;

class HomeController extends Controller
{

    private $videoService;

    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = $this->videoService->getVideos();

        return view('home', [
            'sliders' => [$videos, array_reverse($videos)]
        ]);
    }
}
