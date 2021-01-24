<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use Psr\Http\Message\ResponseInterface;
use ShellyClient\Model\MeterResponse;

class MeterRequest extends RequestAbstract
{
    private const METER_ENDPOINT = 'meter';

    public function doRequest(int $meterIndex = 0): void
    {
        $this->response = $this->client->request('GET', self::METER_ENDPOINT . '/' . $meterIndex);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getMeter(): MeterResponse
    {
        $result = $this->response->getBody()->__toString();

        return $this->serializer->deserialize($result, MeterResponse::class, 'json');
    }
}