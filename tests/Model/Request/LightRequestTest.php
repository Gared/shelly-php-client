<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\LightRequest;

class LightRequestTest extends TestCase
{
    public function requestParametersDataProvider(): array
    {
        $requestClean = new LightRequest();

        $requestEffect = new LightRequest();
        $requestEffect->setEffect(LightRequest::EFFECT_METEOR_SHOWER);

        $requestFull = new LightRequest();
        $requestFull->setEffect(LightRequest::EFFECT_METEOR_SHOWER);
        $requestFull->setMode(LightRequest::MODE_COLOR);
        $requestFull->setRed(255);
        $requestFull->setGreen(0);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestEffect,
                [
                    'effect' => 1,
                ],
            ],
            [
                $requestFull,
                [
                    'mode' => 'color',
                    'effect' => 1,
                    'red' => 255,
                    'green' => 0,
                ],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(LightRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}