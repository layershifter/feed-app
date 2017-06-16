<?php

namespace App\Messages;

use DateTime;

interface MessageInterface extends \JsonSerializable
{
    /**
     * @return string
     */
    public function avatar(): string;

    /**
     * @return string
     */
    public function content(): string;

    /**
     * @return \DateTime
     */
    public function date(): DateTime;

    /**
     * @return int
     */
    public function likes(): int;

    /**
     * @return string
     */
    public function type(): string;
}
