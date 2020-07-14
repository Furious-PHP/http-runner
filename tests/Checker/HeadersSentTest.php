<?php

declare(strict_types=1);

namespace Tests\Furious\HttpRunner\Checker;

use Furious\HttpRunner\Checker;
use Furious\HttpRunner\Exception\HeadersAlreadySentException;
use PHPUnit\Framework\TestCase;

function headers_sent(): bool
{
    return true;
}

class HeadersSentTest extends TestCase
{
    public function testSuccess(): void
    {
        $checker = new Checker();

        $this->expectException(HeadersAlreadySentException::class);
        $this->expectExceptionMessage('Headers already sent');

        $checker->checkHeadersAlreadySent();
    }
}