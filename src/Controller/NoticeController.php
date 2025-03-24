<?php

namespace Rockschtar\WordPress\Notices\Controller;

use Rockschtar\WordPress\Notices\Manager\NoticeManager;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeController
{
    private function __construct()
    {
        add_action('admin_notices', $this->displayNotices(...));
        add_action('admin_init', $this->sessionRequired(...));
    }

    public static function &init(): NoticeController
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    private function sessionRequired(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function displayNotices(): void
    {
        foreach (NoticeType::cases() as $type) {
            $cssClass = match ($type) {
                NoticeType::ERROR => 'notice-error',
                NoticeType::SUCCESS => 'notice-success',
                NoticeType::WARNING => 'notice-warning',
                default => 'notice-info',
            };

            $notices = NoticeManager::getNotices();
            $noticesByType = $notices->filter($type);
            $htmlContainer = '<div class="notice %s">%s</div>';
            if (\count($noticesByType) > 0) {
                foreach ($noticesByType as $notice) {
                    $htmlContent = '<p>' . $notice->getMessage() . '</p>';
                    $cssClasses = $notice->isDismissible() ? $cssClass . ' ' . 'is-dismissible' : $cssClass;
                    echo sprintf($htmlContainer, $cssClasses, $htmlContent);
                }
            }
        }

        NoticeManager::deleteNotices();
    }
}
