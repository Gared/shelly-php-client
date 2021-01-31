<?php
declare(strict_types=1);

namespace ShellyClient\HTTP;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class RequestAbstract
{
    protected ClientInterface $client;

    protected SerializerInterface $serializer;

    protected ResponseInterface $response;

    protected \ShellyClient\Model\Request\RequestInterface $request;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getRequest(): \ShellyClient\Model\Request\RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}