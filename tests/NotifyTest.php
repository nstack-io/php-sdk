<?php

namespace NStack\Tests;

use NStack\Clients\ContinentsClient;
use NStack\Clients\CountriesClient;
use NStack\Clients\IpAddressesClient;
use NStack\Clients\NotifyClient;
use NStack\Models\Continent;
use NStack\Models\Country;
use NStack\Models\IpAddress;
use NStack\Models\SeenUpdate;
use NStack\Models\VersionControlUpdate;

class NotifyTest extends TestCase
{
    public function testVersionControlUpdate()
    {
        $client = $this->getClientWithMockedGet('notify-version-control-update.json');

        $client = new NotifyClient($this->getConfig(), $client);
        $entry = $client->versionControlIndex("mobile");

        $this->assertInstanceOf(VersionControlUpdate::class, $entry);
    }

    public function testVersionControlSeemUpdate()
    {
        $client = $this->getClientWithMockedPost('notify-version-control-seen-update.json');

        $client = new NotifyClient($this->getConfig(), $client);
        $entry = $client->markUpdateAsSeen('test', 689, 'no', 'newer_version');

        $this->assertInstanceOf(SeenUpdate::class, $entry);
    }
}
