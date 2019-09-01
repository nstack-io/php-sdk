<?php

namespace NStack\Tests;

use NStack\Clients\LocalizeClient;
use NStack\Clients\LocalizeLanguagesClient;
use NStack\Models\Language;
use NStack\Models\Resource;

class LocalizeLanguagesTest extends TestCase
{

    public function testLanguagesIndex()
    {
        $client = $this->getClientWithMockedGet('localize-languages-index.json');

        $client = new LocalizeLanguagesClient($this->getConfig(), $client);
        $list = $client->index('mobile');

        foreach ($list as $continent) {
            $this->assertInstanceOf(Language::class, $continent);
        }
    }

    public function testLanguagesBestFit()
    {
        $client = $this->getClientWithMockedGet('localize-languages-best-fit.json');

        $client = new LocalizeLanguagesClient($this->getConfig(), $client);
        $language = $client->bestFit('mobile');

        $this->assertInstanceOf(Language::class, $language);
    }
}
