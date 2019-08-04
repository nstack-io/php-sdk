<?php

namespace NStack\Tests;

use NStack\Clients\LocalizeClient;
use NStack\Models\Resource;

class LocalizeTest extends TestCase
{
    public function testResourceIndex()
    {
        $client = $this->getClientWithMockedGet('resources-index.json');

        $client = new LocalizeClient($this->getConfig(), $client);
        $list = $client->indexResources('');

        foreach ($list as $continent) {
            $this->assertInstanceOf(Resource::class, $continent);
        }
    }

    public function testResourceShow()
    {
        $client = $this->getClientWithMockedGet('resources-show.json');

        $client = new LocalizeClient($this->getConfig(), $client);
        $entry = $client->showResource('http://nodes-cdn-development.imgix.net/nstack/data/localize-publishes/publish-16-h4j9oHHi_IRrFIjA0B0.json');

        $this->assertTrue(is_array($entry));
    }
}
