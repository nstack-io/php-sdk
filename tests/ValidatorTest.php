<?php

namespace NStack\Tests;

use NStack\Clients\ContinentsClient;
use NStack\Clients\CountriesClient;
use NStack\Clients\IpAddressesClient;
use NStack\Clients\ValidatorsClient;
use NStack\Models\Continent;
use NStack\Models\Country;
use NStack\Models\EmailValidation;
use NStack\Models\IpAddress;
use NStack\Models\PhoneValidation;

class ValidatorTest extends TestCase
{
    public function testEmailValidator()
    {
        $client = $this->getClientWithMockedGet('validator-email.json');

        $client = new ValidatorsClient($this->getConfig(), $client);
        $entry = $client->email('test@test.com');

        $this->assertInstanceOf(EmailValidation::class, $entry);
    }

    public function testPhone()
    {
        $client = $this->getClientWithMockedGet('validator-phone.json');

        $client = new ValidatorsClient($this->getConfig(), $client);
        $entry = $client->phone('61304560', 45, true, "mobile");

        $this->assertInstanceOf(PhoneValidation::class, $entry);
    }
}
