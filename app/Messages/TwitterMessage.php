<?php

namespace App\Messages;

use DateTime;
use stdClass;

final class TwitterMessage extends AbstractMessage
{
    /**
     * @var string
     */
    private $avatar;
    /**
     * @var string
     */
    private $content;
    /**
     * @var DateTime
     */
    private $date;
    /**
     * @var int
     */
    private $likes;

    /**
     * TwitterMessage constructor.
     *
     * @param stdClass $message
     */
    public function __construct(stdClass $message)
    {
        $this->avatar = $message->user->profile_image_url_https;
        $this->content = $message->text;
        $this->date = new DateTime($message->created_at);
        $this->likes = $message->favorite_count;
    }

    /**
     * @inheritdoc
     */
    public function avatar(): string
    {
        return $this->avatar;
    }

    /**
     * @inheritdoc
     */
    public function content(): string
    {
        return $this->content;
    }

    /**
     * @inheritdoc
     */
    public function date(): DateTime
    {
        return $this->date;
    }

    /**
     * @inheritdoc
     */
    public function likes(): int
    {
        return $this->likes;
    }

    /**
     * @inheritdoc
     */
    public function type(): string
    {
        return 'twitter';
    }
}
