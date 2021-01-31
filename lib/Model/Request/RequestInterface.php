<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

interface RequestInterface
{
    public function getUrlPath(): string;

    public function getQueryParameters(): array;

    public function getResponseClass(): string;
}