<?php

namespace NStack\Tests;

use NStack\Clients\ContinentsClient;
use NStack\Clients\CountriesClient;
use NStack\Clients\IpAddressesClient;
use NStack\Models\Continent;
use NStack\Models\Country;
use NStack\Models\IpAddress;

class IpAddressesTest extends TestCase
{
    public function testIndex()
    {
        $client = $this->getClientWithMockedGet('ip-addresses-index.json');

        $client = new IpAddressesClient($this->getConfig(), $client);
        $entry = $client->index();

        $this->assertInstanceOf(IpAddress::class, $entry);
    }

    public function testShow()
    {
        $client = $this->getClientWithMockedGet('ip-addresses-show.json');

        $client = new IpAddressesClient($this->getConfig(), $client);
        $entry = $client->show("0.0.0.0");

        $this->assertInstanceOf(IpAddress::class, $entry);
    }
}
