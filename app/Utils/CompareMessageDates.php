<?php

namespace App\Utils;

use App\Messages\MessageInterface;

final class CompareMessageDates
{
    /**
     * @param \App\Messages\MessageInterface $a
     * @param \App\Messages\MessageInterface $b
     *
     * @return int
     */
    public function __invoke(MessageInterface $a, MessageInterface $b): int
    {
        return $b->date() <=> $a->date();
    }
}
