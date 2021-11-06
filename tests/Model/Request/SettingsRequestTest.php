<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ShellyClient\HTTP\Client;
use ShellyClient\HTTP\RequestService;
use ShellyClient\Model\Request\SettingsRequest;
use ShellyClientTest\Mock\HTTP\ClientMock;

class SettingsRequestTest extends TestCase
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
                __DIR__ . '/Fixtures/settings/settings_shelly_plug_s.json',
                'SHPLG-S',
            ],
            [
                __DIR__ . '/Fixtures/settings/settings_shelly_plug_s_version_1_11.json',
                'SHPLG-S',
            ],
        ];
    }

    /**
     * @dataProvider simpleDataProvider
     */
    public function testSimple(string $testFile, string $expectedType): void
    {
        $response = new Response(200, [], file_get_contents($testFile));

        $this->requestService->method('getResponse')->willReturn($response);
        $this->requestService->method('getRequest')->willReturn(new SettingsRequest());

        $settings = $this->requestService->getResponseSerialized();

        self::assertSame('PC', $settings->getName());
        self::assertSame($expectedType, $settings->getDevice()->getType());

        self::assertIsArray($settings->getRelays());
        self::assertCount($settings->getDevice()->getNumOutputs(), $settings->getRelays());
    }

    public function requestParametersDataProvider(): array
    {
        $requestClean = new SettingsRequest();

        $requestWithLed = new SettingsRequest();
        $requestWithLed->setLedPowerDisable(true);
        $requestWithLed->setLedStatusDisable(false);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestWithLed,
                [
                    'led_status_disable' => false,
                    'led_power_disable' => true,
                ],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(SettingsRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}