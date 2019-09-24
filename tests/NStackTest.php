<?php

namespace NStack\Tests;

use NStack\NStack;

class NStackTest extends TestCase
{
    public function testConstructSuccess()
    {
        $config = $this->getConfig();

        $nstack = new NStack($config);

        $this->assertInstanceOf(NStack::class, $nstack);
    }
}
