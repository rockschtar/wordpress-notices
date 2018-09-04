<?php

function add_notice_info(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addInfo($message, $dissmisble);
}

function add_notice_warning(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addWarning($message, $dissmisble);
}

function add_notice_success(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addSuccess($message, $dissmisble);
}

function add_notice_error(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addError($message, $dissmisble);
}
