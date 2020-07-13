<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

final class Header
{
    public function __construct(string $name, string $value, int $code = null, bool $replace = true)
    {
        $this->send($name, $value, $code, $replace);
    }

    public function send(string $name, string $value, int $code = null, bool $replace = true): void
    {
        header($name . ': ' . $value, $replace, $code);
    }
}