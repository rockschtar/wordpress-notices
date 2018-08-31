<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\Wordpress\Notices\Controller;

use Rockschtar\Wordpress\Notices\Manager\NoticeManager;

class NoticeController {

    private function __construct() {
        add_action('admin_notices', array(&$this, 'display_notices'));
        //add_action('admin_notices', array(&$this, 'display_errors'));
        //add_action('admin_notices', array(&$this, 'display_updated'));
    }

    public static function &init() {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    public function display_notices() : void {
        $notices = NoticeManager::getNotices();

        $html_container = '<div class="notice notice-warning">%s</div>';
        if ($notices) {

            $html_content = '<ul>';
            foreach ($notices as $notice):
                $html_content .= '<li>' . $notice->getMessage() . '</li>';
            endforeach;
            $html_content .= '<ul>';
            echo sprintf($html_container, $html_content);
        }

        $notices_single = NoticeManager::getNotices(true);

        if ($notices_single) {
            foreach ($notices_single as $notice_single):
                $html_content = $notice_single;
                echo sprintf($html_container, $html_content);
            endforeach;
        }

        NoticeManager::deleteNotices();
        NoticeManager::deleteNotices(true);
    }


}