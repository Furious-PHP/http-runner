<?php

declare(strict_types=1);

namespace Tests\Furious\HttpRunner\Exception;

use Furious\HttpRunner\Exception\OutputAlreadyWroteException;
use PHPUnit\Framework\TestCase;

class OutputAlreadyWroteExceptionTest extends TestCase
{
    public function testSuccess(): void
    {
        $e = new OutputAlreadyWroteException();

        $this->assertEquals('Output already wrote', $e->getMessage());
    }
}