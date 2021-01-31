<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class Device
{
    private string $type;

    private string $mac;

    private string $hostname;

    private int $numOutputs;

    private int $numMeters;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getMac(): string
    {
        return $this->mac;
    }

    public function setMac(string $mac): void
    {
        $this->mac = $mac;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): void
    {
        $this->hostname = $hostname;
    }

    public function getNumOutputs(): int
    {
        return $this->numOutputs;
    }

    public function setNumOutputs(int $numOutputs): void
    {
        $this->numOutputs = $numOutputs;
    }

    public function getNumMeters(): int
    {
        return $this->numMeters;
    }

    public function setNumMeters(int $numMeters): void
    {
        $this->numMeters = $numMeters;
    }
}