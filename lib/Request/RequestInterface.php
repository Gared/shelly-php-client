<?php
declare(strict_types=1);

namespace ShellyClient\Request;

interface RequestInterface
{
    public function doRequest();

    public function getResponse();
}