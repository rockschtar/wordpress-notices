<?php

namespace Rockschtar\WordPress\Notices\Controller;

use Rockschtar\WordPress\Notices\Manager\NoticeManager;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeController
{
    private function __construct()
    {
        add_action('admin_enqueue_scripts', array(&$this, 'adminEnqueueScripts'));
        add_action('admin_notices', array(&$this, 'displayNotices'));
        add_action('admin_init', array(&$this, 'sessionRequired'));
    }

    public function adminEnqueueScripts(): void
    {
        wp_enqueue_script('rs-admin-notices', RSWPN_PLUGIN_URL . '/scripts/AdminNotices.js');
    }

    public static function &init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    final public function sessionRequired(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function displayNotices(): void
    {
        foreach (NoticeType::toArray() as $type) {
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
