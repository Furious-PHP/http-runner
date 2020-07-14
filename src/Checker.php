<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Furious\HttpRunner\Exception\HeadersAlreadySentException;
use Furious\HttpRunner\Exception\OutputAlreadyWroteException;

final class Checker
{
    public function checkHeadersAlreadySent(): void
    {
        if (headers_sent()) {
            throw new HeadersAlreadySentException();
        }
    }

    public function checkOutputAlreadyWrote(): void
    {
        if (ob_get_level() > 0 and ob_get_length() > 0) {
            throw new OutputAlreadyWroteException();
        }
    }
}