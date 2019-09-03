<?php

namespace NStack\Tests;

use NStack\Clients\CollectionsClient;
use NStack\Tests\objects\CollectionItem;
use NStack\Tests\objects\CollectionShow1;
use NStack\Tests\objects\CollectionShow2;

class CollectionsTest extends TestCase
{
    public function testView()
    {
        $client = $this->getClientWithMockedGet('collection-show-1.json');
        $client = new CollectionsClient($this->getConfig(), $client);
        $entry = $client->view(10);
        foreach ($entry as $item) {
            $this->assertInstanceOf(CollectionShow1::class, new CollectionShow1($item));
        }

        $client = $this->getClientWithMockedGet('collection-show-2.json');
        $client = new CollectionsClient($this->getConfig(), $client);
        $entry = $client->view(10);
        foreach ($entry as $item) {
            $this->assertInstanceOf(CollectionShow2::class, new CollectionShow2($item));
        }
    }

    public function testCreateItem()
    {
        $client = $this->getClientWithMockedPost('collection-create-item.json');
        $client = new CollectionsClient($this->getConfig(), $client);
        $entry = $client->createItem(10, ["id" => 39, "key" => "41"]);
        $this->assertInstanceOf(CollectionItem::class, new CollectionItem($entry));
    }

    public function testDeleteItem()
    {
        $mock = $this->getMockBuilder('CollectionsClient')
            ->setMethods(array('delete'))
            ->getMock();

        $mock->expects($this->once())
            ->method('delete');

        $mock->delete(10, 15);
    }

    public function testUpdateItem()
    {
        $client = $this->getClientWithMockedPost('collection-update-item.json');
        $client = new CollectionsClient($this->getConfig(), $client);
        $entry = $client->updateItem(10, 315, ["id" => 39, "key" => "50"]);
        $this->assertInstanceOf(CollectionItem::class, new CollectionItem($entry));
    }

    public function testViewItem()
    {
        $client = $this->getClientWithMockedGet('collection-show-item.json');
        $client = new CollectionsClient($this->getConfig(), $client);
        $entry = $client->viewItem(39, 315);
        $this->assertInstanceOf(CollectionItem::class, new CollectionItem($entry));
    }
}
