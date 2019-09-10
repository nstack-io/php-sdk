<?php

namespace NStack\Clients;

use NStack\Models\Resource;

/**
 * Class CountriesClient
 *
 * @package NStack\Clients
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class LocalizeClient extends NStackClient
{
    /** @var string */
    protected $path = 'content/localize';

    /**
     * indexResources
     *
     * @param string $platform
     * @return array
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function indexResources(string $platform): array
    {
        $response = $this->client->get($this->buildPath($this->path . '/resources/platforms/' . $platform));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Resource($object);
        }

        return $array;
    }

    /**
     * showResource
     *
     * @param $url
     * @return array
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function showResource($url): array
    {
        $response = $this->client->get($url);

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        return $data;
    }
}