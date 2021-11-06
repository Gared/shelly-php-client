<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use GuzzleHttp\Psr7\Response;
use ShellyClient\Model\Request\SettingsRequest;
use ShellyClient\Model\Response\SettingsResponse;

class SettingsRequestTest extends AbstractRequestTest
{
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

        /** @var SettingsResponse $settings */
        $settings = $this->requestService->getResponseSerialized();

        self::assertSame('PC', $settings->getName());
        self::assertSame($expectedType, $settings->getDevice()->getType());

        self::assertNotEmpty($settings->getRelays());
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