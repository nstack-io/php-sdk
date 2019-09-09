<?php

namespace NStack\Tests;

class UgcTest extends TestCase
{
    public function testUgcPushlogs()
    {
        $mock = $this->getMockBuilder('UgcClient')
            ->setMethods(['storePushLog'])
            ->getMock();

        $mock->expects($this->once())
            ->method('storePushLog');

        $mock->storePushLog("fcm", "my fcm key", "standard", true);
    }
}
