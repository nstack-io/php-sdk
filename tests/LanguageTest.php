<?php

namespace NStack\Tests;

use NStack\Clients\LanguagesClient;
use NStack\Models\Language;

class LanguageTest extends TestCase
{
    public function testResourceIndex()
    {
        $client = $this->getClientWithMockedGet('languages-index.json');

        $client = new LanguagesClient($this->getConfig(), $client);
        $list = $client->index();

        foreach ($list as $language) {
            $this->assertInstanceOf(Language::class, $language);
        }
    }

    public function testResourceSearch()
    {
        $client = $this->getClientWithMockedGet('languages-search.json');

        $client = new LanguagesClient($this->getConfig(), $client);
        $list = $client->search("br");

        foreach ($list as $language) {
            $this->assertInstanceOf(Language::class, $language);
        }
    }
}
