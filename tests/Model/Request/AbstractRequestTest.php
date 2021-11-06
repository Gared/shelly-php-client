<?php
declare(strict_types=1);

namespace ShellyClientTest\Model\Request;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ShellyClient\HTTP\RequestService;
use ShellyClientTest\Mock\HTTP\ClientMock;

abstract class AbstractRequestTest extends TestCase
{
    protected static ClientMock $client;
    /**
     * @var RequestService&MockObject
     */
    protected RequestService $requestService;

    public static function setUpBeforeClass(): void
    {
        self::$client = new ClientMock('');
    }

    protected function setUp(): void
    {
        $this->requestService = $this
            ->getMockBuilder(RequestService::class)
            ->onlyMethods(['getResponse', 'getRequest'])
            ->setConstructorArgs([self::$client->getHttpClient(), self::$client->getSerializer()])
            ->getMock();
    }
}