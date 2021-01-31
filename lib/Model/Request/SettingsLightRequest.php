<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Exception\InvalidArgumentException;

class SettingsLightRequest extends RequestAbstract implements RequestInterface
{
    public const EFFECT_OFF = 0;
    public const EFFECT_METEOR_SHOWER = 1;
    public const EFFECT_GRADUAL_CHANGE = 2;
    public const EFFECT_BREATH = 3;
    public const EFFECT_FLASH = 4;
    public const EFFECT_ON_OFF_GRADUAL = 5;
    public const EFFECT_RED_GREEN_CHANGE = 6;

    public const TURN_ON = 'on';
    public const TURN_OFF = 'off';
    public const TURN_TOGGLE = 'toggle';

    private int $lightIndex = 0;
    private ?string $turn = null;
    private ?int $effect = null;
    private ?bool $reset = null;
    private ?int $autoOn = null;
    private ?int $autoOff = null;

    public function getLightIndex(): int
    {
        return $this->lightIndex;
    }

    public function setLightIndex(int $lightIndex): SettingsLightRequest
    {
        $this->lightIndex = $lightIndex;
        return $this;
    }

    public function getTurn(): ?string
    {
        return $this->turn;
    }

    public function setTurn(?string $turn): SettingsLightRequest
    {
        if ($turn !== null && !in_array($turn, [self::TURN_ON, self::TURN_OFF, self::TURN_TOGGLE], true)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $turn);
        }

        $this->turn = $turn;
        return $this;
    }

    public function getEffect(): ?int
    {
        return $this->effect;
    }

    public function setEffect(?int $effect): SettingsLightRequest
    {
        if ($effect !== null && ($effect < 0 || $effect > 6)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $effect);
        }

        $this->effect = $effect;
        return $this;
    }

    public function getReset(): ?bool
    {
        return $this->reset;
    }

    public function setReset(?bool $reset): SettingsLightRequest
    {
        $this->reset = $reset;
        return $this;
    }

    public function getAutoOn(): ?int
    {
        return $this->autoOn;
    }

    public function setAutoOn(?int $autoOn): SettingsLightRequest
    {
        $this->autoOn = $autoOn;
        return $this;
    }

    public function getAutoOff(): ?int
    {
        return $this->autoOff;
    }

    public function setAutoOff(?int $autoOff): SettingsLightRequest
    {
        $this->autoOff = $autoOff;
        return $this;
    }

    public function getQueryParameters(): array
    {
        return $this->convertQueryParameters(get_object_vars($this), ['lightIndex']);
    }

    public function getUrlPath(): string
    {
        return 'settings/light/' . $this->getLightIndex();
    }

    public function getResponseClass(): string
    {
        return SettingsLightResponse::class;
    }
}