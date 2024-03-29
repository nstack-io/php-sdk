<?php

namespace NStack\Clients;

use NStack\Models\Continent;

/**
 * Class ContinentsClient
 *
 * @package NStack\Clients
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class ContinentsClient extends NStackClient
{
    /** @var string */
    protected $path = 'geographic/continents';

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
            $array[] = new Continent($object);
        }

        return $array;
    }

    /**
     * show
     *
     * @param $id
     * @return \NStack\Models\Continent
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function show($id): Continent
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $id));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        return new Continent($data['data']);
    }
}