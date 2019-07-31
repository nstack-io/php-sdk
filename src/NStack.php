<?php

namespace NStack;

use NStack\Exceptions\MissingMasterKey;

/**
 * Class NStack
 *
 * @package NStack
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class NStack extends Config
{
    /**
     * NStack constructor.
     *
     * @param \NStack\Config $config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $config)
    {
        parent::__construct($config->getAppId(), $config->getRestAppKey(), $config->getMasterKey(),
            $config->getBaseUrl());
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
        if (!$this->masterKey) {
            throw new MissingMasterKey();
        }

        return $this->baseUrl . '/deeplink/' . $this->appId . '/' . $this->masterKey;
    }
}