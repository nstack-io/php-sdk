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
class NStackClient extends Client
{
    protected $nstackConfig;

    /**
     * NStackClient constructor.
     *
     * @param \NStack\Config $nstackConfig
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $nstackConfig)
    {
        parent::__construct([
            'base_uri' => $nstackConfig->getBaseUrl(),
            'timeout'  => 5,
            'headers'  => [
                'X-Application-Id' => $nstackConfig->getAppId(),
                'X-Rest-Api-Key'   => $nstackConfig->getRestAppKey(),
                'Content-Type'     => 'application/json',
            ],
        ]);

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