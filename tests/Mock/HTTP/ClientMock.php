<?php
declare(strict_types=1);

namespace ShellyClientTest\Mock\HTTP;

use ShellyClient\HTTP\Client;
use Symfony\Component\Serializer\SerializerInterface;

class ClientMock extends Client
{
    public function getSerializer(): SerializerInterface
    {
        return parent::getSerializer();
    }
}