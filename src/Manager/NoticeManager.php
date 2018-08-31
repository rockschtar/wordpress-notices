<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Manager;


use Rockschtar\WordPress\Notices\Models\Notice;
use Rockschtar\WordPress\Notices\Models\Notices;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeManager {

    public static function addSuccess(string $message, bool $single = false): void {
        self::addNotice(new Notice(NoticeType::SUCCESS, $message), $single);
    }

    public static function addWarning(string $message, bool $single = false): void {
        self::addNotice(new Notice(NoticeType::WARNING, $message), $single);
    }

    public static function addError(string $message, bool $single = false): void {
        self::addNotice(new Notice(NoticeType::ERROR, $message), $single);
    }

    public static function addInfo(string $message, bool $single = false): void {
        self::addNotice(new Notice(NoticeType::INFO, $message), $single);
    }

    private static function getTransientKey(bool $single = false): string {

        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if($single) {
            $transient_key = 'rsn-single-' . session_id();
        } else {
            $transient_key = 'rsn-' . session_id();
        }

        return $transient_key;
    }

    public static function getNotices(bool $single = false): Notices {

        $notices_transient = get_transient(self::getTransientKey($single));

        if(empty($notices_transient)) {
            return new Notices();
        }

        $notices = unserialize($notices_transient, ['allowed_classes' => [Notices::class, Notice::class]]);
        return $notices;
    }

    public static function deleteNotices(bool $single = false): void {
        $transient_key = self::getTransientKey($single);
        delete_transient($transient_key);
    }


    private static function addNotice(Notice $notice, bool $single = false): void {
        $transient_key = self::getTransientKey($single);
        $notices = self::getNotices($single);
        $notices->append($notice);
        $notices_transient_single = serialize($notices);
        set_transient($transient_key, $notices_transient_single, 120);
    }

}