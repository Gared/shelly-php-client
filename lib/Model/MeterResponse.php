<?php
declare(strict_types=1);

namespace ShellyClient\Model;

class MeterResponse extends AbstractDefaultResponse
{
    private float $power;

    private float $overpower;

    private bool $isValid;

    private int $timestamp;

    private array $counters;

    private int $total;

    public function getPower(): float
    {
        return $this->power;
    }

    public function setPower(float $power): void
    {
        $this->power = $power;
    }

    public function getOverpower(): float
    {
        return $this->overpower;
    }

    public function setOverpower(float $overpower): void
    {
        $this->overpower = $overpower;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getTimestampDate(): \DateTime
    {
        $date = new \DateTime();
        $date->setTimestamp($this->timestamp);
        return $date;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getCounters(): array
    {
        return $this->counters;
    }

    public function setCounters(array $counters): void
    {
        $this->counters = $counters;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getTotalInKilowattHours(): float
    {
        return $this->total / 60 / 1000;
    }
}