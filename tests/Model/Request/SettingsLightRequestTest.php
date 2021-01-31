<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\SettingsLightRequest;

class SettingsLightRequestTest extends TestCase
{
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