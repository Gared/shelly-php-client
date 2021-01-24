<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use ShellyClient\Model\ActionsResponse;

class ActionsRequest extends RequestAbstract
{
    private const METER_ENDPOINT = 'settings/actions';

    public function doRequest(): void
    {
        $this->response = $this->client->request('GET', self::METER_ENDPOINT);
    }

    public function getActions(): ActionsResponse
    {
        $result = $this->response->getBody()->__toString();

        return $this->serializer->deserialize($result, ActionsResponse::class, 'json');
    }
}