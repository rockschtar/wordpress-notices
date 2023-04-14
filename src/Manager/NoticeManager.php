<?php

namespace Rockschtar\WordPress\Notices\Manager;

use Rockschtar\WordPress\Notices\Models\Notice;
use Rockschtar\WordPress\Notices\Models\Notices;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeManager
{
    public static function addSuccess(string $message, bool $dismissible = false): void
    {
        self::addNotice(new Notice(NoticeType::SUCCESS, $message, $dismissible));
    }

    public static function addWarning(string $message, bool $dismissible = false): void
    {
        self::addNotice(new Notice(NoticeType::WARNING, $message, $dismissible));
    }

    public static function addError(string $message, bool $dismissible = false): void
    {
        self::addNotice(new Notice(NoticeType::ERROR, $message, $dismissible));
    }

    public static function addInfo(string $message, bool $dismissible = false): void
    {
        self::addNotice(new Notice(NoticeType::INFO, $message, $dismissible));
    }

    private static function getTransientKey(): string
    {
        return 'rswn-' . session_id();
    }

    public static function getNotices(): Notices
    {

        $notices_transient = get_transient(self::getTransientKey());
        if (empty($notices_transient)) {
            return new Notices();
        }

        return unserialize($notices_transient, ['allowed_classes' => [Notices::class, Notice::class]]);
    }

    public static function deleteNotices(): void
    {
        $transient_key = self::getTransientKey();
        delete_transient($transient_key);
    }

    private static function addNotice(Notice $notice): void
    {
        $transientKey = self::getTransientKey();
        $notices = self::getNotices();
        $notices->append($notice);
        $noticesTransientSingle = serialize($notices);
        set_transient($transientKey, $noticesTransientSingle, 120);
    }
}
