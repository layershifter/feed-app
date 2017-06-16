<?php

namespace App\Sources;

interface SourceInterface
{
    /**
     * @param int $limit
     *
     * @return \App\Messages\MessageInterface[]|array
     */
    public function fetch($limit = 25): array;
}
