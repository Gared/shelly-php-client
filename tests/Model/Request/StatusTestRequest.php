<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use GuzzleHttp\Psr7\Response;
use ShellyClient\Model\Request\StatusRequest;
use ShellyClient\Model\Response\StatusResponse;

class StatusTestRequest extends AbstractTestRequest
{
    public static function simpleDataProvider(): array
    {
        return [
            [
                __DIR__ . '/Fixtures/status/status_shelly_bulb.json',
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
        $this->requestService->method('getRequest')->willReturn(new StatusRequest());

        /** @var StatusResponse $status */
        $status = $this->requestService->getResponseSerialized();

        self::assertSame(true, $status->getLight()->isOn());
        self::assertSame(50, $status->getLight()->getBrightness());
    }

    public static function requestParametersDataProvider(): array
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