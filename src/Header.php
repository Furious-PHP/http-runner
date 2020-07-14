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
        if ($code) {
            header($name . ': ' . $value, $replace, $code);
        } else {
            header($name . ': ' . $value, $replace);
        }
    }
}