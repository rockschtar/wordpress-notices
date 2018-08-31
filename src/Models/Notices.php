<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\Wordpress\Notices\Models;

use Rockschtar\TypedArrays\TypedArray;

class Notices extends TypedArray {
    public function current() : Notice {
        return parent::current();
    }

    public function getType(): string {
        return Notice::class;
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