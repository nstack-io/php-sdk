<?php

namespace NStack\Tests;

use NStack\Clients\ContinentsClient;
use NStack\Models\Continent;

class ContinentTest extends TestCase
{
    public function testIndex()
    {
        $client = $this->getClientWithMockedGet('continents-index.json');

        $client = new ContinentsClient($this->getConfig(), $client);
        $list = $client->index();

        foreach ($list as $continent) {
            $this->assertInstanceOf(Continent::class, $continent);
        }
    }

    public function testShow()
    {
        $client = $this->getClientWithMockedGet('continents-show.json');

        $client = new ContinentsClient($this->getConfig(), $client);
        $entry = $client->show(1);

        $this->assertInstanceOf(Continent::class, $entry);
    }
}
