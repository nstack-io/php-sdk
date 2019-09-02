<?php

namespace NStack\Tests;

use NStack\Clients\ProposalsClient;
use NStack\Models\Proposal;

class ProposalTest extends TestCase
{
    public function testProposalIndex()
    {
        $client = $this->getClientWithMockedGet('proposals-index.json');

        $client = new ProposalsClient($this->getConfig(), $client);
        $list = $client->index('test');

        foreach ($list as $item) {
            $this->assertInstanceOf(Proposal::class, $item);
        }
    }

    public function testProposalStore()
    {
        $client = $this->getClientWithMockedPost('proposals-store.json');

        $client = new ProposalsClient($this->getConfig(), $client);
        $object = $client->store(
            'test',
            'forceHeader',
            'new Text',
            'en-GB',
            'mobile',
            'versionControl'
        );

        $this->assertInstanceOf(Proposal::class, $object);
    }

    public function testProposalDelete()
    {
        $mock = $this->getMockBuilder('ProposalsClient')
            ->setMethods(array('delete'))
            ->getMock();

        $mock->expects($this->once())
            ->method('delete');

        $mock->delete(1, 'test');
    }
}
