<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\MeterRequest;

class MeterRequestTest extends TestCase
{
    public static function requestParametersDataProvider(): array
    {
        $requestClean = new MeterRequest();

        $requestIndex = new MeterRequest();
        $requestIndex->setMeterIndex(1);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestIndex,
                [],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(MeterRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}