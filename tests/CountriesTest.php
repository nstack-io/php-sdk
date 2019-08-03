<?php

namespace NStack\Tests;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Country;

class CountriesTest extends TestCase
{
    public function testParseModelSuccess()
    {
        $data = $this->getMockAsArray('countries-index.json');

        foreach ($data['data'] as $raw) {
            $continent = new Country($raw);
            $this->assertInstanceOf(Country::class, $continent);
        }
    }

    public function testParseModelFailed()
    {
        $data = $this->getMockAsArray('continents-index.json');

        $item = $data['data'][0];
        unset($item['id']);

        try {
            new Country([]);

            $this->assertTrue(false);
        } catch (FailedToParseException $e) {
            $this->assertTrue(true);
        }
    }
}
