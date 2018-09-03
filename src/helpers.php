<?php

public
function add_notice_info(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addInfo($message, $dissmisble);
}

public
function add_notice_warning(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addWarning($message, $dissmisble);
}

public
function add_notice_success(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addSuccess($message, $dissmisble);
}

public
function add_notice_error(string $message, bool $dissmisble = false): void {
    \Rockschtar\WordPress\Notices\Manager\NoticeManager::addError($message, $dissmisble);
}
