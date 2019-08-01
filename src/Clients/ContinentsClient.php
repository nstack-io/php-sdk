<?php

namespace NStack\Clients;

use Illuminate\Database\Eloquent\Collection;
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
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \GuzzleHttp\Exception\RequestException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function index(): Collection
    {
        $response = $this->get($this->buildPath($this->path));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $collection = new Collection();
        foreach ($data['data'] as $object) {
            $collection->add(new Continent($object));
        }

        return $collection;
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