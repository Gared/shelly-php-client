<?php
declare(strict_types=1);

namespace ShellyClient\HTTP;

use GuzzleHttp\ClientInterface;
use ShellyClient\Model\Request\SettingsActionsRequest;
use ShellyClient\Model\Request\SettingsLightRequest;
use ShellyClient\Model\Response\SettingsActionsResponse;
use ShellyClient\Model\Response\LightResponse;
use ShellyClient\Model\Response\MeterResponse;
use ShellyClient\Model\Response\RelayResponse;
use ShellyClient\Model\Request\LightRequest;
use ShellyClient\Model\Request\MeterRequest;
use ShellyClient\Model\Request\RelayRequest;
use ShellyClient\Model\Request\RequestInterface;
use ShellyClient\Model\Request\SettingsRequest;
use ShellyClient\Model\Request\StatusRequest;
use ShellyClient\Model\Response\SettingsLightResponse;
use ShellyClient\Model\Response\SettingsResponse;
use ShellyClient\Model\Response\StatusResponse;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class Client
{
    private ClientInterface $httpClient;

    private SerializerInterface $serializer;

    private string $baseUrl;

    private ?string $deviceName;

    /**
     * @param string $baseUrl Base url used for requests e.g. http://192.168.1.10
     * @param string|null $deviceName Optional name for this device
     * @param ClientInterface|null $client Optional Client object used to do requests
     */
    public function __construct(string $baseUrl, string $deviceName = null, ClientInterface $client = null)
    {
        $this->baseUrl = $baseUrl;
        $this->deviceName = $deviceName;
        $this->serializer = $this->getSerializer();
        if ($client === null) {
            $this->httpClient = $this->createDefaultHttpClient();
        } else {
            $this->httpClient = $client;
        }
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function getSettings(SettingsRequest $request): SettingsResponse
    {
        return $this->executeRequest($request);
    }

    public function getMeter(MeterRequest $request): MeterResponse
    {
        return $this->executeRequest($request);
    }

    public function getRelay(RelayRequest $request): RelayResponse
    {
        return $this->executeRequest($request);
    }

    public function getStatus(StatusRequest $request): StatusResponse
    {
        return $this->executeRequest($request);
    }

    public function getActions(SettingsActionsRequest $request): SettingsActionsResponse
    {
        return $this->executeRequest($request);
    }

    public function getSettingsLight(SettingsLightRequest $request): SettingsLightResponse
    {
        return $this->executeRequest($request);
    }

    public function getLight(LightRequest $request): LightResponse
    {
        return $this->executeRequest($request);
    }

    protected function executeRequest(RequestInterface $request)
    {
        $requestService = new RequestService($this->getHttpClient(), $this->getSerializer());
        $requestService->doRequest($request);
        return $requestService->getResponseSerialized();
    }

    protected function createDefaultHttpClient(): ClientInterface
    {
        return new \GuzzleHttp\Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 5,
            'connect_timeout' => 5,
        ]);
    }

    protected function getSerializer(): SerializerInterface
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new PhpDocExtractor()),
        ];

        return new Serializer($normalizers, $encoders);
    }

    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}