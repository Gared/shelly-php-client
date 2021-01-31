<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Model\Response\SettingsResponse;

class SettingsRequest extends RequestAbstract implements RequestInterface
{
    private ?int $maxPower = null;
    private ?bool $ledStatusDisable = null;
    private ?bool $ledPowerDisable = null;
    private ?array $actions = null;

    public function getMaxPower(): ?int
    {
        return $this->maxPower;
    }

    public function setMaxPower(?int $maxPower): void
    {
        $this->maxPower = $maxPower;
    }

    public function getLedStatusDisable(): ?bool
    {
        return $this->ledStatusDisable;
    }

    public function setLedStatusDisable(?bool $ledStatusDisable): void
    {
        $this->ledStatusDisable = $ledStatusDisable;
    }

    public function getLedPowerDisable(): ?bool
    {
        return $this->ledPowerDisable;
    }

    public function setLedPowerDisable(?bool $ledPowerDisable): void
    {
        $this->ledPowerDisable = $ledPowerDisable;
    }

    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * @param array $actions
     */
    public function setActions(array $actions): void
    {
        $this->actions = $actions;
    }

    public function getQueryParameters(): array
    {
        return $this->convertQueryParameters(get_object_vars($this));
    }

    public function getUrlPath(): string
    {
        return 'settings';
    }

    public function getResponseClass(): string
    {
        return SettingsResponse::class;
    }
}