<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\IpAddress;

/**
 * Class IpAddressesClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class IpAddressesClient extends NStackClient
{
    /** @var string */
    protected $path = 'geographic/ip-address';

    /**
     * index
     *
     * @return IpAddress
     * @throws FailedToParseException
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function index(): IpAddress
    {
        $response = $this->client->get($this->buildPath($this->path));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new IpAddress($data['data']);
    }

    /**
     * show
     *
     * @param String $ip
     * @return  IpAddress
     * @throws  FailedToParseException
     * @author  Tiago Araujo <tiar@nodesagency.com>
     */
    public function show(String $ip): IpAddress
    {
        $response = $this->client->get($this->buildPath($this->path . '?ip=' . $ip));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new IpAddress($data['data']);
    }
}