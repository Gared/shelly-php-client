<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Exception\InvalidArgumentException;
use ShellyClient\Model\Response\LightResponse;

class LightRequest extends RequestAbstract implements RequestInterface
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

    public const MODE_WHITE = 'white';
    public const MODE_COLOR = 'color';

    private int $lightIndex = 0;
    private ?string $mode = null;
    private ?string $turn = null;
    private ?int $effect = null;
    private ?int $red = null;
    private ?int $green = null;
    private ?int $blue = null;
    private ?int $white = null;

    public function getLightIndex(): int
    {
        return $this->lightIndex;
    }

    public function setLightIndex(int $lightIndex): LightRequest
    {
        $this->lightIndex = $lightIndex;
        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): LightRequest
    {
        if ($mode !== null && !in_array($mode, [self::MODE_COLOR, self::MODE_WHITE], true)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $mode);
        }

        $this->mode = $mode;
        return $this;
    }

    public function getTurn(): ?string
    {
        return $this->turn;
    }

    public function setTurn(?string $turn): LightRequest
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

    public function setEffect(?int $effect): LightRequest
    {
        if ($effect !== null && ($effect < 0 || $effect > 6)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $effect);
        }

        $this->effect = $effect;
        return $this;
    }

    public function getRed(): ?int
    {
        return $this->red;
    }

    public function setRed(?int $red): LightRequest
    {
        if ($red !== null && ($red < 0 || $red > 255)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $red);
        }

        $this->red = $red;
        return $this;
    }

    public function getGreen(): ?int
    {
        return $this->green;
    }

    public function setGreen(?int $green): LightRequest
    {
        if ($green !== null && ($green < 0 || $green > 255)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $green);
        }

        $this->green = $green;
        return $this;
    }

    public function getBlue(): ?int
    {
        return $this->blue;
    }

    public function setBlue(?int $blue): LightRequest
    {
        if ($blue !== null && ($blue < 0 || $blue > 255)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $blue);
        }

        $this->blue = $blue;
        return $this;
    }

    public function getWhite(): ?int
    {
        return $this->white;
    }

    public function setWhite(?int $white): LightRequest
    {
        $this->white = $white;
        return $this;
    }

    public function getQueryParameters(): array
    {
        return $this->convertQueryParameters(get_object_vars($this), ['lightIndex']);
    }

    public function getUrlPath(): string
    {
        return 'light/' . $this->getLightIndex();
    }

    public function getResponseClass(): string
    {
        return LightResponse::class;
    }
}