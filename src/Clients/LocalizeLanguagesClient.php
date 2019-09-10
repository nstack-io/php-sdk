<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Language;

/**
 * Class CountriesClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class LocalizeLanguagesClient extends NStackClient
{
    /** @var string */
    protected $path = 'content/localize';

    /**
     * index
     *
     * @param string $platform
     * @return array
     * @throws FailedToParseException
     */
    public function index(string $platform): array
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $platform . '/languages'));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Language($object);
        }

        return $array;
    }

    /**
     * bestFit
     *
     * @param string $platform
     * @return Language
     * @throws FailedToParseException
     */
    public function bestFit(string $platform): Language
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $platform . '/languages/best_fit'));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new Language($data['data']);
    }
}