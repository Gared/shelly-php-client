<?php
declare(strict_types=1);

namespace ShellyClient\Model;

class SettingsResponse extends AbstractDefaultResponse
{
    private int $maxPower;

    private bool $ledStatusDisable;

    private bool $ledPowerDisable;

    /**
     * @var RelayResponse[]
     */
    private array $relays;

    /**
     * @var MeterResponse[]
     */
    private array $meters;

    public function getMaxPower(): int
    {
        return $this->maxPower;
    }

    public function setMaxPower(int $max_power): void
    {
        $this->maxPower = $max_power;
    }

    public function isLedStatusDisable(): bool
    {
        return $this->ledStatusDisable;
    }

    public function setLedStatusDisable(bool $ledStatusDisable): void
    {
        $this->ledStatusDisable = $ledStatusDisable;
    }

    public function isLedPowerDisable(): bool
    {
        return $this->ledPowerDisable;
    }

    public function setLedPowerDisable(bool $ledPowerDisable): void
    {
        $this->ledPowerDisable = $ledPowerDisable;
    }

    /**
     * @return RelayResponse[]
     */
    public function getRelays(): array
    {
        return $this->relays;
    }

    /**
     * @param RelayResponse[] $relays
     */
    public function setRelays(array $relays): void
    {
        $this->relays = $relays;
    }

    /**
     * @return MeterResponse[]
     */
    public function getMeters(): array
    {
        return $this->meters;
    }

    /**
     * @param MeterResponse[] $meters
     */
    public function setMeters(array $meters): void
    {
        $this->meters = $meters;
    }
}