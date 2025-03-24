<?php

namespace Rockschtar\WordPress\Notices\Models;

class Notice
{
    private NoticeType $type;

    private string $message;

    private bool $dismissible;

    public function __construct(NoticeType $type, string $message, bool $dismissible = false)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dismissible = $dismissible;
    }

    public function getType(): NoticeType
    {
        return $this->type;
    }

    public function setType(NoticeType $type): Notice
    {
        $this->type = $type;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): Notice
    {
        $this->message = $message;
        return $this;
    }

    public function isDismissible(): bool
    {
        return $this->dismissible;
    }

    public function setDismissible(bool $dismissible): Notice
    {
        $this->dismissible = $dismissible;
        return $this;
    }
}
