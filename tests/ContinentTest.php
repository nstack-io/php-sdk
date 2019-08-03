<?php

namespace NStack\Tests;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Continent;

class ContinentTest extends TestCase
{
    public function testParseModelSuccess()
    {
        $data = $this->getMockAsArray('continents-index.json');

        foreach ($data['data'] as $raw) {
            $continent = new Continent($raw);
            $this->assertInstanceOf(Continent::class, $continent);
        }
    }

    public function testParseModelFailed()
    {
        $data = $this->getMockAsArray('continents-index.json');

        $item = $data['data'][0];
        unset($item['id']);

        try {
            new Continent([]);

            $this->assertTrue(false);
        } catch (FailedToParseException $e) {
            $this->assertTrue(true);
        }
    }
}