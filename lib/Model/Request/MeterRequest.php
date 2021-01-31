<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Model\Response\MeterResponse;

class MeterRequest implements RequestInterface
{
    private int $meterIndex = 0;

    public function getMeterIndex(): int
    {
        return $this->meterIndex;
    }

    public function setMeterIndex(int $meterIndex): MeterRequest
    {
        $this->meterIndex = $meterIndex;
        return $this;
    }

    public function getQueryParameters(): array
    {
        return [];
    }

    public function getUrlPath(): string
    {
        return 'meter/' . $this->getMeterIndex();
    }

    public function getResponseClass(): string
    {
        return MeterResponse::class;
    }
}