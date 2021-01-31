<?php
declare(strict_types=1);

namespace ShellyClient\Model\Request;

use ShellyClient\Exception\InvalidArgumentException;
use ShellyClient\Model\Response\RelayResponse;

class RelayRequest extends RequestAbstract implements RequestInterface
{
    public const TURN_ON = 'on';
    public const TURN_OFF = 'off';
    public const TURN_TOGGLE = 'toggle';

    private int $relayIndex = 0;
    private ?string $turn = null;
    private ?int $timer = null;

    public function getRelayIndex(): int
    {
        return $this->relayIndex;
    }

    public function setRelayIndex(int $relayIndex): RelayRequest
    {
        $this->relayIndex = $relayIndex;
        return $this;
    }

    public function getTurn(): ?string
    {
        return $this->turn;
    }

    public function setTurn(?string $turn): RelayRequest
    {
        if ($turn !== null && !in_array($turn, [self::TURN_ON, self::TURN_OFF, self::TURN_TOGGLE], true)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $turn);
        }

        $this->turn = $turn;
        return $this;
    }

    public function getTimer(): ?int
    {
        return $this->timer;
    }

    public function setTimer(?int $timer): RelayRequest
    {
        $this->timer = $timer;
        return $this;
    }

    public function getQueryParameters(): array
    {
        return $this->convertQueryParameters(get_object_vars($this), ['relayIndex']);
    }

    public function getUrlPath(): string
    {
        return 'relay/' . $this->getRelayIndex();
    }

    public function getResponseClass(): string
    {
        return RelayResponse::class;
    }
}