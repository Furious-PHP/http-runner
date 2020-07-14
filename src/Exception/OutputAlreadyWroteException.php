<?php

declare(strict_types=1);

namespace Furious\HttpRunner\Exception;

use RuntimeException;
use Throwable;

class OutputAlreadyWroteException extends RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        if ('' === $message) {
            $this->message = 'Output already wrote';
        }
    }
}