<?php

namespace Rockschtar\WordPress\Notices\Models;

enum NoticeType : string
{
    case ERROR = 'error';

    case INFO = 'info';

    case SUCCESS = 'success';

    case WARNING = 'warning';
}
