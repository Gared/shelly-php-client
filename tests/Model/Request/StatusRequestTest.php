<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\StatusRequest;

class StatusRequestTest extends TestCase
{
    public function requestParametersDataProvider(): array
    {
        $requestClean = new StatusRequest();

        return [
            [
                $requestClean,
                [],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(StatusRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}