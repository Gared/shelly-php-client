# shelly-php-client 

You can use this library to access the HTTP API of a Shelly device.
You can find the official API documentation [here](https://shelly-api-docs.shelly.cloud). 

## Installation

Use composer
```gitattributes
composer require gared/shelly-php-client
```

## Getting started

### Configure client

```php
$client = new \ShellyClient\HTTP\Client('http://192.168.1.10');
```

If you have configured login credentials you have to create the client like this:
```php
$client = new \ShellyClient\HTTP\Client('http://shellyuser:secret@192.168.1.10');
```

### Get current power usage

```php
$meter = $client->getMeter();
$power = $meter->getPower();
echo "Current power usage: " . $power;
```

### Power shelly plug "on"

```php
$client->getRelay(0, \ShellyClient\Request\RelayRequest::TURN_ON);
```


### Full example

```php
// Create new client for one device
$clientLightA = new \ShellyClient\HTTP\Client('http://192.168.1.10', 'ShellyDeviceLightA');
$clientLightB = new \ShellyClient\HTTP\Client('http://192.168.1.20', 'ShellyDeviceLightB');
// Switch device on and get relay data
$relay = $clientLightA->getRelay(0, \ShellyClient\Request\RelayRequest::TURN_ON);
// check if timer has been set
if ($relay->hasTimer()) {
    // do something
}

$meter = $clientLightA->getMeter();
// Get total power consumption in kW/h
$kilowattHours = $meter->getTotalInKilowattHours();
// Get last three watt per minute power consumption values
$counters = $meter->getCounters();

// Parallel call informations from device B
$power = $clientLightB->getMeter()->getPower();
// Get device name set above in construct
$deviceNameDeviceB = $clientLightB->getDeviceName();
```

## Supported Platforms

* You need at least PHP 7.4

## Supported APIs
| API                | Code                    |
| -------------------|-------------------------|
| /settings          | $client->getSettings(); |
| /settings/actions  | $client->getActions();  |
| /status            | $client->getStatus();   |
| /meter             | $client->getMeter();    |
| /relay             | $client->getRelay();    |