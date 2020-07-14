<?php

declare(strict_types=1);

namespace Tests\Furious\HttpRunner\Exception;

use Furious\HttpRunner\Exception\HeadersAlreadySentException;
use PHPUnit\Framework\TestCase;

class HeadersAlreadySentExceptionTest extends TestCase
{
    public function testSuccess(): void
    {
        $e = new HeadersAlreadySentException();

        $this->assertEquals('Headers already sent', $e->getMessage());
    }
}