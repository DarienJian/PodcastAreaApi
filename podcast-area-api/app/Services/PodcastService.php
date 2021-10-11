<?php


namespace App\Services;

use App\Helpers\ParseXml;
use App\Models\Podcast;
use App\Repositories\PodcastRepository;

class PodcastService
{
    private $parseXml;
    private $podcastRepository;

    public function __construct(
        ParseXml $parseXml,
        PodcastRepository $podcastRepository
    ) {
        $this->parseXml = $parseXml;
        $this->podcastRepository = $podcastRepository;
    }

    public function createPodcast($rssLink)
    {
        $podcast = Podcast::where('rss_link', $rssLink)->exists();
        if ($podcast) {
            return response(['success' => false, 'message' => '失敗, Podcast已存在']);
        }

        $result = $this->parseXml->parsingXml($rssLink);
        if (array_key_exists('channel', $result)) {
            return $this->podcastRepository->createPodcast($rssLink, $result['channel']);
        }

        return response(['success' => false, 'message' => '失敗, 無效的連結']);
    }
}
