# shelly-php-client 

You can use this library to access an API of a Shelly device.
You can find the official API documentation [here](https://shelly-api-docs.shelly.cloud). 

## Installation

Use composer
```gitattributes
composer require gared/shelly-php-client
```

## Getting started

### Configure client

```php
$client = new \ShellyClient\HTTP\Client('http://192.168.1.10', 'ShellyDeviceLightA');
```

### Get current power usage

```php
$meter = $client->getMeter();
$power = $meter->getPower();
echo "Watt usage: " . $power;
```

### Power shelly plug "on"

```php
$client->getRelay(0, \ShellyClient\Request\RelayRequest::TURN_ON);
```

## Supported Platforms

* You need at least PHP 7.4
