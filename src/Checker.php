<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Furious\HttpRunner\Exception\HeadersAlreadySentException;
use Furious\HttpRunner\Exception\OutputAlreadyWroteException;

final class Checker
{
    public function checkHeadersAlreadySent(bool $alreadySent = null): void
    {
        if (null === $alreadySent) {
            $headersSent = headers_sent();
        }

        if ($alreadySent) {
            throw new HeadersAlreadySentException();
        }
    }

    public function checkOutputAlreadyWrote(bool $alreadyWrote = null): void
    {
        if (null === $alreadyWrote) {
            $wrote = ob_get_level() > 0 and ob_get_length() > 0;
        }

        if ($alreadyWrote) {
            throw new OutputAlreadyWroteException();
        }
    }
}