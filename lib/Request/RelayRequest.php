<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use ShellyClient\Exception\InvalidArgumentException;
use ShellyClient\Model\RelayResponse;

class RelayRequest extends RequestAbstract
{
    private const METER_ENDPOINT = 'relay';

    public const TURN_ON = 'on';
    public const TURN_OFF = 'off';
    public const TURN_TOGGLE = 'toggle';

    public function doRequest(int $relayIndex = 0, string $turn = null): void
    {
        if ($turn !== null && !in_array($turn, [self::TURN_ON, self::TURN_OFF, self::TURN_TOGGLE], true)) {
            throw new InvalidArgumentException('Invalid value for turn parameter: ' . $turn);
        }

        $this->response = $this->client->request('GET', self::METER_ENDPOINT . '/' . $relayIndex, [
            'query' => [
                'turn' => $turn
            ]
        ]);
    }

    public function getRelay(): RelayResponse
    {
        $result = $this->response->getBody()->__toString();

        return $this->serializer->deserialize($result, RelayResponse::class, 'json');
    }
}