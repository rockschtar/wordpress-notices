<?php

namespace Rockschtar\WordPress\Notices\Models;

class Notices
{
    /**
     * @var \Rockschtar\WordPress\Notices\Models\Notice[]
     */
    private array $notices = [];

    public function append(Notice $notice): void
    {
        $this->notices[] = $notice;
    }

    /**
     * @return \Rockschtar\WordPress\Notices\Models\Notice[]
     */
    public function get() : array
    {
        return $this->notices;
    }

    /**
     * @return \Rockschtar\WordPress\Notices\Models\Notice[]
     */
    public function filter(string $type): array
    {
        $result = [];
        foreach ($this->notices as $item) {
            if ($item->getType() === $type) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
