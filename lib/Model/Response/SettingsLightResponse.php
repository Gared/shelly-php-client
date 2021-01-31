<?php
declare(strict_types=1);

namespace ShellyClient\Model\Response;

class SettingsLightResponse extends AbstractDefaultResponse
{
    private bool $ison;

    private int $red;

    private int $green;

    private int $blue;

    private int $white;

    private int $gain;

    private int $temp;

    private int $brightness;

    private int $effect;

    private string $defaultState;

    private int $autoOn;

    private int $autoOff;

    private int $power;

    private bool $schedule;

    private array $scheduleRules;

    public function isOn(): bool
    {
        return $this->ison;
    }

    public function setIson(bool $ison): void
    {
        $this->ison = $ison;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function setRed(int $red): void
    {
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen(int $green): void
    {
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): void
    {
        $this->blue = $blue;
    }

    public function getWhite(): int
    {
        return $this->white;
    }

    public function setWhite(int $white): void
    {
        $this->white = $white;
    }

    public function getGain(): int
    {
        return $this->gain;
    }

    public function setGain(int $gain): void
    {
        $this->gain = $gain;
    }

    public function getTemp(): int
    {
        return $this->temp;
    }

    public function setTemp(int $temp): void
    {
        $this->temp = $temp;
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

    public function getDefaultState(): string
    {
        return $this->defaultState;
    }

    public function setDefaultState(string $defaultState): void
    {
        $this->defaultState = $defaultState;
    }

    public function getAutoOn(): int
    {
        return $this->autoOn;
    }

    public function setAutoOn(int $autoOn): void
    {
        $this->autoOn = $autoOn;
    }

    public function getAutoOff(): int
    {
        return $this->autoOff;
    }

    public function setAutoOff(int $autoOff): void
    {
        $this->autoOff = $autoOff;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    public function isSchedule(): bool
    {
        return $this->schedule;
    }

    public function setSchedule(bool $schedule): void
    {
        $this->schedule = $schedule;
    }

    /**
     * @return array
     */
    public function getScheduleRules(): array
    {
        return $this->scheduleRules;
    }

    /**
     * @param array $scheduleRules
     */
    public function setScheduleRules(array $scheduleRules): void
    {
        $this->scheduleRules = $scheduleRules;
    }
}