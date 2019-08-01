<?php

namespace NStack\Clients;

use GuzzleHttp\Client;
use NStack\Config;

class NStackClient extends Client
{
    public function __construct(Config $config)
    {
        $config = [
            'headers' => [
                'X-Application-Id' => $config->getAppId(),
                'X-Rest-Api-Key' => $config->getRestAppKey(),
                'Content-Type' => 'application/json'
            ]
        ];

        parent::__construct($config);
    }
}