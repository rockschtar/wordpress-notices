<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Manager;

use Rockschtar\WordPress\Notices\Models\Notice;
use Rockschtar\WordPress\Notices\Models\Notices;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeManager {

    public static function addUpdated(string $message, bool $single = false): void {
        self::addGeneral(NoticeType::UPDATED, $message, $single);
    }

    public static function addNotice(string $message, bool $single = false): void {
        self::addGeneral(NoticeType::NOTICE, $message, $single);
    }

    public static function addError(string $message, bool $single = false): void {
        self::addGeneral(NoticeType::ERROR, $message, $single);
    }

    public static function getNotices(bool $single = false): Notices {
        return self::getGeneral(NoticeType::NOTICE, $single);
    }

    public static function getUpdated(bool $single = false): Notices {
        return self::getGeneral(NoticeType::UPDATED, $single);
    }

    public static function getErrors(bool $single = false): Notices {
        return self::getGeneral(NoticeType::ERROR, $single);
    }

    private static function getTransientKey(string $type, bool $single): string {

        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if($single) {
            $transient_key = 'rsn-' . $type . '-single' . session_id();
        } else {
            $transient_key = 'rsn-' . $type . session_id();
        }

        return $transient_key;
    }

    private static function deleteGeneral(string $type, bool $single = false): void {
        delete_transient(self::getTransientKey($type, $single));
    }

    public static function deleteNotices(bool $single = false): void {
        self::deleteGeneral(NoticeType::NOTICE, $single);
    }

    public static function deleteUpdated(bool $single = false): void {
        self::deleteGeneral(NoticeType::UPDATED, $single);
    }

    public static function deleteErrors(bool $single = false): void {
        self::deleteGeneral(NoticeType::ERROR, $single);
    }

    private static function getGeneral(string $type, bool $single = false): Notices {

        $notices_transient = get_transient(self::getTransientKey($type, $single));

        if(empty($notices_transient)) {
            return new Notices();
        }

        $notices = unserialize($notices_transient, ['allowed_classes' => [Notices::class]]);
        return $notices;
    }

    private static function addGeneral(string $type, string $message, bool $single = false): void {

        if($single) {
            $transient_key = 'rsn-' . $type . '-single';
        } else {
            $transient_key = 'rsn-' . $type;
        }

        $notices = self::getGeneral($type, $single);
        $notice = new Notice($type, $message);
        $notices->append($notice);
        $notices_transient_single = serialize($notices);
        set_transient($transient_key, $notices_transient_single, 120);

    }

}