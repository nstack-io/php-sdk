<?php

namespace NStack;

use NStack\Clients\ContinentsClient;
use NStack\Exceptions\MissingMasterKeyException;

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

    /** @var \NStack\Clients\ContinentsClient */
    protected $continentsClient;

    /**
     * NStack constructor.
     *
     * @param \NStack\Config $config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->continentsClient = new ContinentsClient($config);
    }

    /**
     * @return \NStack\Config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * getContinentsClient
     *
     * @return \NStack\Clients\ContinentsClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getContinentsClient(): ContinentsClient
    {
        return $this->continentsClient;
    }

    /**
     * getDeeplink
     *
     * @return string
     * @throws \NStack\Exceptions\MissingMasterKeyException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getDeeplink(): string
    {
        if (!$this->config->getMasterKey()) {
            throw new MissingMasterKeyException();
        }

        return $this->config->getBaseUrl() . '/deeplink/' . $this->config->getAppId() . '/' .
               $this->config->getMasterKey();
    }
}