<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\TestCase;
use ShellyClient\Model\Request\SettingsActionsRequest;

class SettingsActionsRequestTest extends TestCase
{
    public function requestParametersDataProvider(): array
    {
        $requestClean = new SettingsActionsRequest();

        $requestFull = new SettingsActionsRequest();
        $requestFull->setName('out_on_url');
        $requestFull->setIndex(0);
        $requestFull->setEnabled(true);
        $requestFull->setActions(['http://10.10.1.1/']);

        return [
            [
                $requestClean,
                [],
            ],
            [
                $requestFull,
                [
                    'index' => 0,
                    'name' => 'out_on_url',
                    'enabled' => true,
                    'actions' => [
                        'http://10.10.1.1/'
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider requestParametersDataProvider
     */
    public function testRequestParameters(SettingsActionsRequest $request, array $expectedQueryParameters): void
    {
        self::assertSame($expectedQueryParameters, $request->getQueryParameters());
    }
}