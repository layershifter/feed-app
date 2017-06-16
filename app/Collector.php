<?php

namespace App;

use App\Sources\TwitterSource;
use App\Utils\CompareMessageDates;

final class Collector
{
    /**
     * @var array
     */
    private $sources = [
        TwitterSource::class,
    ];

    /**
     * @param int $limit
     *
     * @return array
     */
    public function fetch(int $limit = 25): array
    {
        $messages = array_map(function (string $className) {
            /* @var \App\Sources\SourceInterface $source */
            $source = new $className;

            return $source->fetch();
        }, $this->sources);
        $messages = array_flatten($messages);

        usort($messages, new CompareMessageDates());

        return array_slice($messages, 0, $limit);
    }
}
