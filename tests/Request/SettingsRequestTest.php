<?php
declare(strict_types=1);

namespace ShellyClientTest\Request;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ShellyClient\HTTP\Client;
use ShellyClient\Request\SettingsRequest;
use ShellyClientTest\Mock\HTTP\ClientMock;

class SettingsRequestTest extends TestCase
{
    private static Client $client;

    private SettingsRequest $settingsRequest;

    public static function setUpBeforeClass(): void
    {
        self::$client = new ClientMock('');
    }

    protected function setUp(): void
    {
        $this->settingsRequest = $this
            ->getMockBuilder(SettingsRequest::class)
            ->setMethods(['getResponse'])
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
        ];
    }

    /**
     * @dataProvider simpleDataProvider
     */
    public function testSimple(string $testFile, string $expectedType): void
    {
        $response = new Response(200, [], file_get_contents($testFile));

        $this->settingsRequest->method('getResponse')->willReturn($response);

        $settings = $this->settingsRequest->getSettings();

        self::assertSame('PC', $settings->getName());
        self::assertSame($expectedType, $settings->getDevice()->getType());

        self::assertIsArray($settings->getRelays());
        self::assertCount($settings->getDevice()->getNumOutputs(), $settings->getRelays());
    }
}