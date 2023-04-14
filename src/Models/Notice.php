<?php

namespace Rockschtar\WordPress\Notices\Models;

class Notice
{
    private string $type;

    private string $message;

    private bool $dismissible;

    public function __construct(string $type, string $message, bool $dismissible = false)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dismissible = $dismissible;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Notice
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
