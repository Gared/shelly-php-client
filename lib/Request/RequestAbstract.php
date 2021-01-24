<?php
declare(strict_types=1);

namespace ShellyClient\Request;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class RequestAbstract implements RequestInterface
{
    protected ClientInterface $client;

    protected SerializerInterface $serializer;

    protected ResponseInterface $response;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}