<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use GuzzleHttp\Psr7\Response;
use ShellyClient\Model\Request\SettingsLightRequest;
use ShellyClient\Model\Response\SettingsLightResponse;

class SettingsLightTestRequest extends AbstractTestRequest
{
    public static function simpleDataProvider(): array
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

    public static function requestParametersDataProvider(): array
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