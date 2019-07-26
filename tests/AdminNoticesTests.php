<?php

namespace Rockschtar\WordPress\MetaRevisions\Tests;

use PHPUnit\Framework\TestCase;
use function Brain\Monkey\setUp;
use function Brain\Monkey\tearDown;

class AdminNoticesTests extends TestCase {
    public function setUp(): void {
        parent::setUp();
        setUp();

    }

    public function tearDown(): void {
        tearDown();
        parent::tearDown();
    }
}