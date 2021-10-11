<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PodcastService;

class RssLinkController extends Controller
{
    private $podcastService;

    public function __construct(
        PodcastService $podcastService
    ) {
        $this->podcastService = $podcastService;
    }

    public function storage(Request $request)
    {
        $rssLink = $request->input('link');

        return $this->podcastService->createPodcast($rssLink);
    }
}
