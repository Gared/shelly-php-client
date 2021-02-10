<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class LightResponse extends AbstractDefaultResponse
{
    private bool $isOn;

    private bool $hasTimer;

    private int $timerStarted;

    private int $timerDuration;

    private int $timerRemaining;

    public function isOn(): bool
    {
        return $this->isOn;
    }

    public function setIsOn(bool $isOn): void
    {
        $this->isOn = $isOn;
    }

    public function isHasTimer(): bool
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
}