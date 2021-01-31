<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ShellyClient\HTTP\Client;
use ShellyClient\HTTP\RequestService;
use ShellyClient\Model\Request\SettingsLightRequest;
use ShellyClient\Model\Response\SettingsLightResponse;
use ShellyClientTest\Mock\HTTP\ClientMock;

class SettingsLightRequestTest extends TestCase
{
    private static Client $client;

    private RequestService $requestService;

    public static function setUpBeforeClass(): void
    {
        self::$client = new ClientMock('');
    }

    protected function setUp(): void
    {
        $this->requestService = $this
            ->getMockBuilder(RequestService::class)
            ->setMethods(['getResponse', 'getRequest'])
            ->setConstructorArgs([self::$client->getHttpClient(), self::$client->getSerializer()])
            ->getMock();
    }

    public function simpleDataProvider(): array
    {
        return [
            [
                __DIR__ . '/Fixtures/settings_light/settings_light_shelly_bulb.json',
            ],
        ];
    }

    /**
     * @dataProvider simpleDataProvider
     */
    public function testSimple(string $testFile): void
    {
        $response = new Response(200, [], file_get_contents($testFile));

        $this->requestService->method('getResponse')->willReturn($response);
        $this->requestService->method('getRequest')->willReturn(new SettingsLightRequest());

        /** @var SettingsLightResponse $settingsLight */
        $settingsLight = $this->requestService->getResponseSerialized();

        self::assertSame(false, $settingsLight->isOn());
        self::assertSame(5406, $settingsLight->getTemp());
        self::assertSame(0, $settingsLight->getPower());
    }

    public function requestParametersDataProvider(): array
    {
        $requestClean = new SettingsLightRequest();

        $requestWithEffect = new SettingsLightRequest();
        $requestWithEffect->setEffect(SettingsLightRequest::EFFECT_FLASH);

        $requestWithAuto = new SettingsLightRequest();
        $requestWithAuto->setAutoOn(60);
        $requestWithAuto->setAutoOff(30);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestWithEffect,
                [
                    'effect' => 4,
                ],
            ],
            [
                $requestWithAuto,
                [
                    'auto_on' => 60,
                    'auto_off' => 30,
                ],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(SettingsLightRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}