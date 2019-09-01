<?php

namespace NStack\Tests;

use NStack\Clients\CountriesClient;
use NStack\Clients\TimezoneClient;
use NStack\Models\Country;
use NStack\Models\Timezone;

class TimezonesTest extends TestCase
{
    public function testIndex()
    {
        $client = $this->getClientWithMockedGet('timezones-index.json');

        $client = new TimezoneClient($this->getConfig(), $client);
        $list = $client->index();

        foreach ($list as $continent) {
            $this->assertInstanceOf(Timezone::class, $continent);
        }
    }

    public function testShow()
    {
        $client = $this->getClientWithMockedGet('timezones-show.json');

        $client = new TimezoneClient($this->getConfig(), $client);
        $entry = $client->show(240);

        $this->assertInstanceOf(Timezone::class, $entry);
    }

    public function testByLatLng()
    {
        $client = $this->getClientWithMockedGet('timezones-lat-lng.json');

        $client = new TimezoneClient($this->getConfig(), $client);
        $entry = $client->showByLatLng(55.1231, 12.1231);

        $this->assertInstanceOf(Timezone::class, $entry);
    }
}
