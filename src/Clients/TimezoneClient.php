<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Timezone;

/**
 * Class TimezoneClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class TimezoneClient extends NStackClient
{
    /** @var string */
    protected $path = 'geographic/time_zones';

    /**
     * index
     *
     * @return array
     * @throws FailedToParseException
     */
    public function index(): array
    {
        $response = $this->client->get($this->buildPath($this->path));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Timezone($object);
        }

        return $array;
    }

    /**
     * show
     *
     * @param $id
     * @return Timezone
     * @throws FailedToParseException
     */
    public function show($id): Timezone
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $id));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);
        return new Timezone($data['data']);
    }

    /**
     * show
     *
     * @param float $lat
     * @param float $lng
     * @return Timezone
     * @throws FailedToParseException
     */
    public function showByLatLng(float $lat, float $lng): Timezone
    {
        $response = $this->client->get(
            $this->buildPath($this->path . '/by_lat_lng?=lat_lng' . $lat . ',' . $lng)
        );
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);
        return new Timezone($data['data']);
    }

}