<?php

namespace NStack;

use NStack\Clients\NStackClient;
use NStack\Exceptions\MissingMasterKey;

/**
 * Class NStack
 *
 * @package NStack
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class NStack
{
    /** @var \NStack\Config */
    protected $config;

    /** @var \NStack\Clients\NStackClient */
    protected $client;

    /**
     * NStack constructor.
     *
     * @param \NStack\Config $config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new NStackClient($config);
    }

    /**
     * getDeeplink
     *
     * @return string
     * @throws \NStack\Exceptions\MissingMasterKey
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getDeeplink(): string
    {
        if (!$this->config->getMasterKey()) {
            throw new MissingMasterKey();
        }

        return $this->config->getBaseUrl() . '/deeplink/' . $this->config->getAppId() . '/' .
               $this->config->getMasterKey();
    }
}