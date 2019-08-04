<?php

namespace NStack\Clients;

use NStack\Models\Country;

/**
 * Class CountriesClient
 *
 * @package NStack\Clients
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class CountriesClient extends NStackClient
{
    /** @var string */
    protected $path = 'geographic/countries';

    /**
     * index
     *
     * @return array
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function index(): array
    {
        $response = $this->client->get($this->buildPath($this->path));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Country($object);
        }

        return $array;
    }

    /**
     * show
     *
     * @param $id
     * @return \NStack\Models\Country
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function show($id): Country
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $id));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        return new Country($data['data']);
    }
}