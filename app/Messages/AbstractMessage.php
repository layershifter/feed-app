<?php

namespace App\Messages;

abstract class AbstractMessage implements MessageInterface
{
    /**
     * @inheritdoc
     */
    public function jsonSerialize(): array
    {
        return [
            'avatar'  => $this->avatar(),
            'content' => $this->content(),
            'likes'   => $this->likes(),
            'date'    => $this->date()->format('D M d Y H:i:s O'),
            'type'    => $this->type(),
        ];
    }
}
