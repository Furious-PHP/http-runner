<?php

declare(strict_types=1);

namespace Furious\HttpRunner;

use Psr\Http\Message\ResponseInterface;

final class Emitter
{
    public function emitStatusLine(ResponseInterface $response) : void
    {
        $reasonPhrase = $response->getReasonPhrase();
        $statusCode = $response->getStatusCode();

        header('HTTP/' . $response->getProtocolVersion() . ' ' . $statusCode . ($reasonPhrase ? ' ' . $reasonPhrase : ''), true, $statusCode);
    }

    public function emitHeaders(ResponseInterface $response) : void
    {
        $statusCode = $response->getStatusCode();

        foreach ($response->getHeaders() as $header => $values) {
            $name = $this->filterHeader($header);
            $name === 'Set-Cookie' ? false : true;
            $isFirst = boolval($name);
            foreach ($values as $value) {
                new Header($name, $value, $statusCode, $isFirst);
                $isFirst = false;
            }
        }
    }

    public function emitBody(ResponseInterface $response): void
    {
        echo $response->getBody();
    }

    private function filterHeader(string $header) : string
    {
        return ucwords($header, '-');
    }
}