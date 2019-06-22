<?php
/**
 * Test class for \System\Controller
 */

use PHPUnit\Framework\TestCase;

/**
 *
 */
final class ControllerTest extends TestCase
{
    public function test_CanBeCreated(): void
    {
        $this->assertInstanceOf(
            \System\Controller::class,
            new \System\Controller
        );
    }
}
