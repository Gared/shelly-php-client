<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use Psr\Http\Message\ResponseInterface;
use ShellyClient\Model\SettingsResponse;

class SettingsRequest extends RequestAbstract
{
    private const SETTINGS_ENDPOINT = 'settings';

    public function doRequest(int $maxPower = null, bool $ledStatusDisable = null, bool $ledPowerDisable = null, array $actions = []): void
    {
        $queryParams = [];
        if ($maxPower !== null) {
            $queryParams['max_power'] = $maxPower;
        }

        if ($ledStatusDisable !== null) {
            $queryParams['led_status_disable'] = (int)$ledStatusDisable;
        }

        if ($ledPowerDisable !== null) {
            $queryParams['led_power_disable'] = (int)$ledPowerDisable;
        }

        $queryParams['actions'] = $actions;

        $this->response = $this->client->request('GET', self::SETTINGS_ENDPOINT, [
            'query' => $queryParams,
        ]);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getSettings(): SettingsResponse
    {
        $result = $this->getResponse()->getBody()->__toString();

        return $this->serializer->deserialize($result, SettingsResponse::class, 'json');
    }
}