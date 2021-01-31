<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class RelayResponse extends AbstractDefaultResponse
{
    private bool $isOn;

    private bool $hasTimer;

    private int $timerStarted;

    private int $timerDuration;

    private int $timerRemaining;

    private bool $overpower;

    private string $source;

    public function isOn(): bool
    {
        return $this->isOn;
    }

    public function setIsOn(bool $isOn): void
    {
        $this->isOn = $isOn;
    }

    public function hasTimer(): bool
    {
        return $this->hasTimer;
    }

    public function setHasTimer(bool $hasTimer): void
    {
        $this->hasTimer = $hasTimer;
    }

    public function getTimerStarted(): int
    {
        return $this->timerStarted;
    }

    public function setTimerStarted(int $timerStarted): void
    {
        $this->timerStarted = $timerStarted;
    }

    public function getTimerDuration(): int
    {
        return $this->timerDuration;
    }

    public function setTimerDuration(int $timerDuration): void
    {
        $this->timerDuration = $timerDuration;
    }

    public function getTimerRemaining(): int
    {
        return $this->timerRemaining;
    }

    public function setTimerRemaining(int $timerRemaining): void
    {
        $this->timerRemaining = $timerRemaining;
    }

    public function isOverpower(): bool
    {
        return $this->overpower;
    }

    public function setOverpower(bool $overpower): void
    {
        $this->overpower = $overpower;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }
}