<?php


namespace App\Repositories;


use App\Models\Podcast;
use Carbon\Carbon;

class PodcastRepository
{
    public function __construct()
    {
    }

    public function createPodcast($rssLink, $channel)
    {
        $lastPublishDate = Carbon::parse($channel['item'][0]['pubDate']);

        try {
            Podcast::create([
                'title'             => $channel['title'],
                'copyright'         => $channel['copyright'],
                'cover_image'       => $channel['image']['url'],
                'description'       => $channel['description'],
                'rss_link'          => $rssLink,
                'last_publish_date' => $lastPublishDate
            ]);
            return response(['success' => true, 'message' => '成功']);
        } catch (\Exception $exception) {
            return response(['success' => false, 'message' => $exception->getMessage()]);
        }
    }
}
