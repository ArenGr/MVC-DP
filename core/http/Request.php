<?php

namespace Core\Http;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;

abstract class Request implements RequestInterface
{
    public string $protocolVersion;

    public function getProtocolVersion(): string
    {
        return $this->protocolVersion;
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        $new = clone $this;
        $new->protocolVersion = $version;
        return $new;
    }

    public function getHeaders(): array
    {
        return [];
    }
}