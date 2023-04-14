<?php
/**
 * Plugin Name: WordPress Notices
 * Plugin URI: https://gitlab.com/rockschtar/wordpress-notices
 * Description: Library for simple creation of admin notices
 * Version: develop
 * Author: Stefan Helmer
 * Author URI: https://gitlab.com/rockschtar/
 * License: MIT License
 */

define('RSWPN_PLUGIN_URL', plugin_dir_url(__FILE__));
define('RSWPN_PLUGIN_DIR', plugin_dir_path(__FILE__));

if(file_exists(RSWPN_PLUGIN_DIR . 'vendor/autoload.php')) {
    require_once RSWPN_PLUGIN_DIR . 'vendor/autoload.php';
}

\Rockschtar\WordPress\Notices\Controller\NoticeController::init();

/**
 * @param string $message
 * @param bool $dissmisble
 */
function add_notice_info(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addInfo($message, $dissmisble);
}

/**
 * @param string $message
 * @param bool $dissmisble
 */
function add_notice_warning(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addWarning($message, $dissmisble);
}

/**
 * @param string $message
 * @param bool $dissmisble
 */
function add_notice_success(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addSuccess($message, $dissmisble);
}

/**
 * @param string $message
 * @param bool $dissmisble
 */
function add_notice_error(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addError($message, $dissmisble);
}
