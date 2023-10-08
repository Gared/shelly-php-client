<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Response;

use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Response\SettingsResponse;

class SettingsResponseTest extends TestCase
{
    public static function sunsetDataProvider(): array
    {
        $sunsetDateTime = new DateTime('2021-01-20 16:56:29', new DateTimeZone('Europe/Berlin'));

        return [
            'somewhere' => [
                'unixtime' => (new DateTime('2021-01-30 16:00:00', new DateTimeZone('Europe/Berlin')))->getTimestamp(),
                'lat' => 59.165711,
                'lng' => 9.436040,
                'sunset_unixtime' => (new DateTime('2021-01-30 16:38:19', new DateTimeZone('Europe/Berlin')))->getTimestamp(),
                'seconds_sunset' => 60 * 38 + 19,
            ],
            'munich' => [
                'unixtime' => (new DateTime('2021-01-20 13:00:00', new DateTimeZone('Europe/Berlin')))->getTimestamp(),
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => $sunsetDateTime->getTimestamp(),
                'seconds_sunset' => (60 * 60 * 3) + (56 * 60) + 29,
            ],
            'munich after sunset' => [
                'unixtime' => (new DateTime('2021-01-20 17:30:00', new DateTimeZone('Europe/Berlin')))->getTimestamp(),
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => $sunsetDateTime->getTimestamp(),
                'seconds_sunset' => -2011,
            ],
            'munich before sunrise' => [
                'unixtime' => (new DateTime('2021-01-20 06:21:00', new DateTimeZone('Europe/Berlin')))->getTimestamp(),
                'lat' => 48.137154,
                'lng' => 11.576124,
                'sunset_unixtime' => $sunsetDateTime->getTimestamp(), //1611144000 + (60 * 60 * 3) + (54 * 60) + 45,
                'seconds_sunset' => (60 * 60 * 10) + (35 * 60) + 29,
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
