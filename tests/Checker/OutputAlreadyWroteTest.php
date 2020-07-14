<?php

declare(strict_types=1);

namespace Tests\Furious\HttpRunner\Checker;

use Furious\HttpRunner\Checker;
use Furious\HttpRunner\Exception\OutputAlreadyWroteException;
use PHPUnit\Framework\TestCase;

function ob_get_level(): int
{
    return 1;
}

class OutputAlreadyWroteTest extends TestCase
{
    public function testSuccess(): void
    {
        $checker = new Checker();

        $this->expectException(OutputAlreadyWroteException::class);
        $this->expectExceptionMessage('Output already wrote');

        echo PHP_EOL;
        $checker->checkOutputAlreadyWrote();
    }
}