<?php

namespace NStack\Tests;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Continent;

class ContinentTest extends TestCase
{
    public function testParseModelSuccess()
    {
        $data = $this->getMockAsArray('continents.json');

        $continent = new Continent($data['data'][0]);

        $this->assertInstanceOf(Continent::class, $continent);
    }

    public function testParseModelFailed()
    {
        $data = $this->getMockAsArray('continents.json');

        $item = $data['data'][0];
        unset($item['id']);

        print_r(new Continent([]));
        die;
        try {
            $continent = new Continent([]);

            $this->assertTrue(false);
        } catch (FailedToParseException $e) {
            $this->assertTrue(true);
        }
    }
}
