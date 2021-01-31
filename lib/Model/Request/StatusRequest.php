<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Model\Response\StatusResponse;

class StatusRequest implements RequestInterface
{
    public function getQueryParameters(): array
    {
        return [];
    }

    public function getUrlPath(): string
    {
        return 'status';
    }

    public function getResponseClass(): string
    {
        return StatusResponse::class;
    }
}