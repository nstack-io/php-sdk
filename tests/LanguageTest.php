<?php

namespace NStack\Tests;

use NStack\Clients\LanguagesClient;
use NStack\Clients\LocalizeClient;
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

    public function testLanguagesIndex()
    {
        $client = $this->getClientWithMockedGet('localize-languages-index.json');

        $client = new LocalizeClient($this->getConfig(), $client);
        $list = $client->indexLanguage('mobile');

        foreach ($list as $continent) {
            $this->assertInstanceOf(Language::class, $continent);
        }
    }

    public function testLanguagesBestFit()
    {
        $client = $this->getClientWithMockedGet('localize-languages-best-fit.json');

        $client = new LocalizeClient($this->getConfig(), $client);
        $language = $client->bestFitLanguage('mobile');

        $this->assertInstanceOf(Language::class, $language);
    }
}
