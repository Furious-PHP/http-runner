<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Psr\Http\Message\ResponseInterface;

final class Runner implements RunnerInterface
{
    private Checker $checker;

    public function __construct()
    {
        $this->checker = new Checker();
    }

    public function run(ResponseInterface $response): bool
    {
        $this->checker->checkHeadersAlreadySent();
        $this->checker->checkOutputAlreadyWrote();

        return true;
    }
}