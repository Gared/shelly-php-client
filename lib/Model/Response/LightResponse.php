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

    private int $brightness;

    private int $effect;

    private int $temp;

    private int $gain;

    private int $white;

    private int $red;

    private int $blue;

    private int $green;

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

    public function getBrightness(): int
    {
        return $this->brightness;
    }

    public function setBrightness(int $brightness): void
    {
        $this->brightness = $brightness;
    }

    public function getEffect(): int
    {
        return $this->effect;
    }

    public function setEffect(int $effect): void
    {
        $this->effect = $effect;
    }

    public function getTemp(): int
    {
        return $this->temp;
    }

    public function setTemp(int $temp): void
    {
        $this->temp = $temp;
    }

    public function getGain(): int
    {
        return $this->gain;
    }

    public function setGain(int $gain): void
    {
        $this->gain = $gain;
    }

    public function getWhite(): int
    {
        return $this->white;
    }

    public function setWhite(int $white): void
    {
        $this->white = $white;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function setRed(int $red): void
    {
        $this->red = $red;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): void
    {
        $this->blue = $blue;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen(int $green): void
    {
        $this->green = $green;
    }
}