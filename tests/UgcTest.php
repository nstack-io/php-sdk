<?php

namespace NStack\Tests;

class UgcTest extends TestCase
{
    public function testUgcPushlogs()
    {
        $mock = $this->getMockBuilder('UgcClient')
            ->setMethods(['store'])
            ->getMock();

        $mock->expects($this->once())
            ->method('store');

        $mock->store("fcm", "my fcm key", "standard", true);
    }
}
