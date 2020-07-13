<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Psr\Http\Message\ResponseInterface;

final class Runner implements RunnerInterface
{
    private Checker $checker;
    private Emitter $emitter;

    public function __construct()
    {
        $this->checker = new Checker();
        $this->emitter = new Emitter();
    }

    public function run(ResponseInterface $response): bool
    {
        $this->checker->checkHeadersAlreadySent();
        $this->checker->checkOutputAlreadyWrote();

        $this->emitter->emitHeaders($response);
        $this->emitter->emitStatusLine($response);
        $this->emitter->emitBody($response);

        return true;
    }
}