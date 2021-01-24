<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use ShellyClient\Model\StatusResponse;

class StatusRequest extends RequestAbstract
{
    private const STATUS_ENDPOINT = 'status';

    public function doRequest(): void
    {
        $this->response = $this->client->request('GET', self::STATUS_ENDPOINT);
    }

    public function getStatus(): StatusResponse
    {
        $result = $this->response->getBody()->__toString();

        return $this->serializer->deserialize($result, StatusResponse::class, 'json');
    }
}