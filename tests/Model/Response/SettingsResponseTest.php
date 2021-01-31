<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Response;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Response\SettingsResponse;

class SettingsResponseTest extends TestCase
{
    public function sunsetDataProvider(): array
    {
        return [
            'somewhere' => [
                'unixtime' => 1612018741,
                'lat' => 59.165711,
                'lng' => 9.436040,
                'sunset_unixtime' => 1612020958,
                'seconds_sunset' => 60 * 36 + 57,
            ],
            'munich' => [
                'unixtime' => 1611144000,
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => 1611144000 + (60 * 60 * 3) + (54 * 60) + 45,
                'seconds_sunset' => (60 * 60 * 3) + (54 * 60) + 45,
            ],
            'munich after sunset' => [
                'unixtime' => 1611160085,
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => 1611144000 + (60 * 60 * 3) + (54 * 60) + 45,
                'seconds_sunset' => -2000,
            ],
            'munich before sunrise' => [
                'unixtime' => 1611120085,
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => 1611144000 + (60 * 60 * 3) + (54 * 60) + 45,
                'seconds_sunset' => (60 * 60 * 10) + (33 * 60) + 20,
            ],
        ];
    }

    /**
     * @dataProvider sunsetDataProvider
     */
    public function testSunset(int $unixTime, float $lat, float $lng, int $expectedSunsetUnixTime, int $expectedSecondsToSunset): void
    {
        $settings = new SettingsResponse();
        $settings->setUnixtime($unixTime);
        $settings->setLat($lat);
        $settings->setLng($lng);

        self::assertSame($expectedSunsetUnixTime, $settings->getSunsetUnixTime());
        self::assertSame($expectedSecondsToSunset, $settings->getSecondsToSunset());
    }
}
