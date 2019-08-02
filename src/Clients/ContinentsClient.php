<?php

namespace NStack\Clients;

use NStack\Exceptions\NotFoundException;
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
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function index(): array
    {
        $response = $this->get($this->buildPath($this->path));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = Continent($object);
        }

        return $array;
    }

    /**
     * show
     *
     * @param $id
     * @return \NStack\Models\Continent
     * @throws \NStack\Exceptions\NotFoundException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function show($id): Continent
    {
        foreach ($this->index() as $continent) {
            /** @var $continent Continent */
            if ($continent->getId() == $id) {
                return $continent;
            }
        }

        throw new NotFoundException();
    }
}