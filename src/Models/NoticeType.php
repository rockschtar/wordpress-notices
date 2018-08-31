<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Models;

use MyCLabs\Enum\Enum;

class NoticeType extends Enum {

    public const ERROR = 'error';
    public const INFO = 'info';
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
}