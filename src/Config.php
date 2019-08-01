<?php

namespace NStack;

/**
 * Class Config
 *
 * @package NStack
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Config
{
    /** @var string|null */
    protected $baseUrl = 'https://nstack.io';

    /** @var string */
    protected $version = 'v2';

    /** @var string */
    protected $appId;

    /** @var string */
    protected $restAppKey;

    /** @var string|null */
    protected $masterKey;

    /**
     * Config constructor.
     *
     * @param string      $appId
     * @param string      $restAppKey
     * @param string|null $masterKey
     * @param string|null $baseUrl
     * @param string      $version
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(
        string $appId,
        string $restAppKey,
        ?string $masterKey = null,
        ?string $baseUrl = null,
        string $version = 'v2'
    ) {
        $this->appId = $appId;
        $this->restAppKey = $restAppKey;
        $this->masterKey = $masterKey;

        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }

        $this->version = $version;
    }

    /**
     * getBaseUrl
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * setBaseUrl
     *
     * @param string $baseUrl
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * setAppId
     *
     * @param string $appId
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * getRestAppKey
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getRestAppKey(): string
    {
        return $this->restAppKey;
    }

    /**
     * setRestAppKey
     *
     * @param string $restAppKey
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setRestAppKey(string $restAppKey): void
    {
        $this->restAppKey = $restAppKey;
    }

    /**
     * getMasterKey
     *
     * @return string|null
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getMasterKey(): ?string
    {
        return $this->masterKey;
    }

    /**
     * setMasterKey
     *
     * @param string|null $masterKey
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setMasterKey(?string $masterKey): void
    {
        $this->masterKey = $masterKey;
    }

    /**
     * getVersion
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * setVersion
     *
     * @param string $version
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }
}