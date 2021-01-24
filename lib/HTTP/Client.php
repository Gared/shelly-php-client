<?php
declare(strict_types=1);

namespace ShellyClient\HTTP;

use GuzzleHttp\ClientInterface;
use ShellyClient\Model\ActionsResponse;
use ShellyClient\Model\MeterResponse;
use ShellyClient\Model\RelayResponse;
use ShellyClient\Model\SettingsResponse;
use ShellyClient\Model\StatusResponse;
use ShellyClient\Request\ActionsRequest;
use ShellyClient\Request\MeterRequest;
use ShellyClient\Request\RelayRequest;
use ShellyClient\Request\SettingsRequest;
use ShellyClient\Request\StatusRequest;
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

    public function getSettings(int $maxPower = null, bool $ledStatusDisable = null, bool $ledPowerDisable = null, array $actions = []): SettingsResponse
    {
        $settingsService = new SettingsRequest($this->getHttpClient(), $this->getSerializer());
        $settingsService->doRequest($maxPower, $ledStatusDisable, $ledPowerDisable, $actions);
        return $settingsService->getSettings();
    }

    public function getMeter(int $meterIndex = 0): MeterResponse
    {
        $meterService = new MeterRequest($this->getHttpClient(), $this->getSerializer());
        $meterService->doRequest($meterIndex);
        return $meterService->getMeter();
    }

    public function getRelay(int $relayIndex = 0, string $turn = null): RelayResponse
    {
        $relayService = new RelayRequest($this->getHttpClient(), $this->getSerializer());
        $relayService->doRequest($relayIndex, $turn);
        return $relayService->getRelay();
    }

    public function getStatus(): StatusResponse
    {
        $statusService = new StatusRequest($this->getHttpClient(), $this->getSerializer());
        $statusService->doRequest();
        return $statusService->getStatus();
    }

    public function getActions(): ActionsResponse
    {
        $actionsService = new ActionsRequest($this->getHttpClient(), $this->getSerializer());
        $actionsService->doRequest();
        return $actionsService->getActions();
    }

    protected function createDefaultHttpClient(): ClientInterface
    {
        return new \GuzzleHttp\Client([
            'base_uri' => $this->baseUrl,
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
}