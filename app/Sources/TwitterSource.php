<?php

namespace App\Sources;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Messages\TwitterMessage;
use stdClass;

final class TwitterSource implements SourceInterface
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function fetch($limit = 25): array
    {
        $connection = new TwitterOAuth(
            getenv('TWITTER_CONSUMER_KEY'),
            getenv('TWITTER_CONSUMER_SECRET'),
            getenv('TWITTER_ACCESS_TOKEN'),
            getenv('TWITTER_ACCESS_SECRET')
        );
        $content = $connection->get('/statuses/user_timeline', [
            'count'       => $limit,
            'screen_name' => getenv('TWITTER_SOURCE'),
        ]);

        return array_map(function (stdClass $message) {
            return new TwitterMessage($message);
        }, $content);
    }
}
