<?php

namespace NStack\Tests;

use DateTime;
use NStack\Clients\FilesClient;
use NStack\Models\File;

class FilesTest extends TestCase
{
    public function testStore()
    {
        $client = $this->getClientWithMockedPost('files-store.json');

        $client = new FilesClient($this->getConfig(), $client);
        $entry = $client->store(
            'test',
            'private-password',
            __DIR__ . '/mocks/test.jpg',
            ['test', 'tag'],
            new DateTime()
        );

        $this->assertInstanceOf(File::class, $entry);
    }

    public function testStoreWithPath()
    {
        $client = $this->getClientWithMockedPost('files-store-with-path.json');

        $client = new FilesClient($this->getConfig(), $client);
        $entry = $client->storeWithPath(
            'test',
            'private-password',
            'appId',
            'image/jpeg',
            16980,
            ['test', 'tag'],
            new DateTime()
        );

        $this->assertInstanceOf(File::class, $entry);
    }
}
