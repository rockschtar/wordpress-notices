<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Models;

class Notice {

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $message;

    /**
     * @var bool
     */
    private $dismissible = false;

    /**
     * Notice constructor.
     * @param $type
     * @param $message
     */
    public function __construct($type, $message) {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getType() : String {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Notice
     */
    public function setType($type) : Notice {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage() : String {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Notice
     */
    public function setMessage($message) : Notice {
        $this->message = $message;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDismissible(): bool {
        return $this->dismissible;
    }

    /**
     * @param bool $dismissible
     * @return Notice
     */
    public function setDismissible(bool $dismissible): Notice {
        $this->dismissible = $dismissible;
        return $this;
    }


}