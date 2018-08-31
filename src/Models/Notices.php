<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\WordPress\Notices\Models;

use Rockschtar\TypedArrays\TypedArray;

class Notices extends TypedArray {
    public function current() : Notice {
        return parent::current();
    }

    public function getType(): string {
        return Notice::class;
    }

    /**
     * @param string $type
     * @return Notice[]
     */
    public function filter(string $type): array {

        $result = [];

        foreach($this->getArrayCopy() as $item) {
            /* @var $item Notice */
            if($item->getType() === $type) {
                $result[] = $item;
            }
        }

        return $result;
    }

    protected function isDuplicate($value): bool {
        /* @var $value Notice */
        /* @var $item Notice */

        foreach($this->getArrayCopy() as $item) {
            if($item->getMessage() === $value->getMessage()) {
                return true;
            }
        }

        return false;
    }


}