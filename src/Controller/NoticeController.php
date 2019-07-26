<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Controller;

use Rockschtar\WordPress\Notices\Manager\NoticeManager;
use Rockschtar\WordPress\Notices\Models\NoticeType;

class NoticeController {

    private function __construct() {
        add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
        add_action('admin_notices', array(&$this, 'display_notices'));
        add_action('admin_init', array(&$this, 'session_required'));
    }

    public function admin_enqueue_scripts(): void {
       wp_enqueue_script('rs-admin-notices', RSAS_PLUGIN_URL . '/scripts/AdminNotices.js');
    }

    public static function &init() {
        static $instance = false;
        if(!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    final public function session_required(): void {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function _display_notices(string $type): void {

        switch($type) {
            case NoticeType::ERROR:
                $css_class = 'notice-error';
                break;
            case NoticeType::SUCCESS:
                $css_class = 'notice-success';
                break;
            case NoticeType::WARNING:
                $css_class = 'notice-warning';
                break;
            case NoticeType::INFO:
            default:
                $css_class = 'notice-info';
                break;
        }

        $notices = NoticeManager::getNotices();
        $notices_by_type = $notices->filter($type);

        $html_container = '<div class="notice %s">%s</div>';

        if(\count($notices_by_type) > 0) {
            foreach($notices_by_type as $notice) {
                $html_content = '<p>' . $notice->getMessage() . '</p>';
                $css_classes = $notice->isDismissible() ? $css_class . ' ' . 'is-dismissible' : $css_class;
                echo sprintf($html_container, $css_classes, $html_content);
            }
        }
    }

    public function display_notices(): void {

        foreach(NoticeType::toArray() as $type) {
            $this->_display_notices($type);
        }

        NoticeManager::deleteNotices();
    }

}