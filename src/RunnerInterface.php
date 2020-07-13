<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Psr\Http\Message\ResponseInterface;

interface RunnerInterface
{
    public function run(ResponseInterface $response): bool;
}