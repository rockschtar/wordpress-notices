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
