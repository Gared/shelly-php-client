<?php
declare(strict_types=1);

namespace ShellyClient\HTTP;

use ShellyClient\Model\Request\RequestInterface;
use ShellyClient\Model\Response\LightResponse;
use ShellyClient\Model\Response\MeterResponse;
use ShellyClient\Model\Response\RelayResponse;
use ShellyClient\Model\Response\ResponseInterface;
use ShellyClient\Model\Response\SettingsActionsResponse;
use ShellyClient\Model\Response\SettingsLightResponse;
use ShellyClient\Model\Response\SettingsResponse;
use ShellyClient\Model\Response\StatusResponse;

class RequestService extends RequestAbstract
{
    public function doRequest(RequestInterface $request)
    {
        $this->request = $request;
        $this->response = $this->client->request('GET', $request->getUrlPath(), [
            'query' => $request->getQueryParameters(),
        ]);
    }

    /**
     * @return ResponseInterface|LightResponse|SettingsResponse|MeterResponse|StatusResponse|RelayResponse|SettingsActionsResponse|SettingsLightResponse
     */
    public function getResponseSerialized(): ResponseInterface
    {
        $result = $this->getResponse()->getBody()->__toString();

        return $this->serializer->deserialize($result, $this->getRequest()->getResponseClass(), 'json');
    }
}