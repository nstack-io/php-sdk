<?php

namespace NStack\Clients;

use GuzzleHttp\Client;
use NStack\Config;

/**
 * Class NStackClient
 *
 * @package NStack\Clients
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class NStackClient
{
    protected $client;

    protected $nstackConfig;

    /**
     * NStackClient constructor.
     *
     * @param \NStack\Config          $nstackConfig
     * @param \GuzzleHttp\Client|null $client
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $nstackConfig, Client $client = null)
    {
        if ($client) {
            $this->client = $client;
        } else {
            $this->client = new Client(([
                'base_uri' => $nstackConfig->getBaseUrl(),
                'timeout'  => 5,
                'headers'  => [
                    'X-Application-Id' => $nstackConfig->getAppId(),
                    'X-Rest-Api-Key'   => $nstackConfig->getRestAppKey(),
                    'Content-Type'     => 'application/json',
                ],
            ]));
        }

        $this->nstackConfig = $nstackConfig;
    }

    /**
     * buildPath
     *
     * @param string $path
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    protected function buildPath(string $path): string
    {
        return 'api/' . $this->nstackConfig->getVersion() . '/' . $path;
    }
}