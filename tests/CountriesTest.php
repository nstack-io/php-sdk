<?php

namespace NStack\Tests;

use NStack\Clients\CountriesClient;
use NStack\Models\Country;

class CountriesTest extends TestCase
{
    public function testIndex()
    {
        $client = $this->getClientWithMockedGet('countries-index.json');

        $client = new CountriesClient($this->getConfig(), $client);
        $list = $client->index();

        foreach ($list as $continent) {
            $this->assertInstanceOf(Country::class, $continent);
        }
    }

    public function testShow()
    {
        $client = $this->getClientWithMockedGet('countries-show.json');

        $client = new CountriesClient($this->getConfig(), $client);
        $entry = $client->show(1);

        $this->assertInstanceOf(Country::class, $entry);
    }
}
