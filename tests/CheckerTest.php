<?php

declare(strict_types=1);

namespace Tests\Furious\HttpRunner;

use Furious\HttpRunner\Checker;
use Furious\HttpRunner\Exception\HeadersAlreadySentException;
use Furious\HttpRunner\Exception\OutputAlreadyWroteException;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{
    private Checker $checker;

    public function setUp()
    {
        $this->checker = new Checker();
    }

    public function testHeadersAlreadySent(): void
    {
        $this->expectException(HeadersAlreadySentException::class);
        $this->expectExceptionMessage('Headers already sent');

        $this->checker->checkHeadersAlreadySent(true);
    }

    public function testAlreadyWrote(): void
    {
        $this->expectException(OutputAlreadyWroteException::class);
        $this->expectExceptionMessage('Output already wrote');

        $this->checker->checkOutputAlreadyWrote(true);
    }
}