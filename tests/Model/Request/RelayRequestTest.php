<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\RelayRequest;

class RelayRequestTest extends TestCase
{
    public function requestParametersDataProvider(): array
    {
        $requestClean = new RelayRequest();

        $requestFull = new RelayRequest();
        $requestFull->setTimer(10);
        $requestFull->setTurn(RelayRequest::TURN_TOGGLE);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestFull,
                [
                    'turn' => 'toggle',
                    'timer' => 10,
                ],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(RelayRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}